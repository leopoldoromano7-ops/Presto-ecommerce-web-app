<?php

use App\Models\Announce;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;

uses(RefreshDatabase::class);

function createCategory(): Category
{
    return Category::create([
        "name" => "Elettronica",
    ]);
}

function createAnnounce(User $user, Category $category, ?bool $isAccepted, string $title = "Annuncio di test"): Announce
{
    $announce = Announce::create([
        "title" => $title,
        "description" => "Descrizione sufficientemente lunga per il test.",
        "price" => 99.99,
        "user_id" => $user->id,
        "category_id" => $category->id,
    ]);

    $announce->forceFill([
        "is_accepted" => $isAccepted,
    ])->save();

    return $announce;
}

it("prevents guests from moderating announces", function () {
    $category = createCategory();
    $owner = User::factory()->create();
    $announce = createAnnounce($owner, $category, null);

    $this->patch(route("accept", $announce))
        ->assertRedirect("/login");

    expect($announce->fresh()->is_accepted)->toBeNull();
});

it("prevents non revisors from moderating announces", function () {
    $category = createCategory();
    $owner = User::factory()->create();
    $user = User::factory()->create();
    $announce = createAnnounce($owner, $category, null);

    $this->actingAs($user)
        ->patch(route("accept", $announce))
        ->assertRedirect(route("formRevisor"));

    expect($announce->fresh()->is_accepted)->toBeNull();
});

it("hides pending announces from public pages but keeps them visible to the owner", function () {
    $category = createCategory();
    $owner = User::factory()->create();
    $pendingAnnounce = createAnnounce($owner, $category, null, "Annuncio in revisione");
    $acceptedAnnounce = createAnnounce($owner, $category, true, "Annuncio pubblico");

    $this->get(route("announces_show", $pendingAnnounce))
        ->assertNotFound();

    $this->actingAs($owner)
        ->get(route("announces_show", $pendingAnnounce))
        ->assertOk()
        ->assertSee($pendingAnnounce->title);

    $this->get(route("category_show", $category))
        ->assertOk()
        ->assertSee($acceptedAnnounce->title)
        ->assertDontSee($pendingAnnounce->title);
});

it("requires a signed confirmation flow to make a user revisor", function () {
    $user = User::factory()->create([
        "is_revisor" => false,
    ]);

    $this->get(route("make.revisor", $user))
        ->assertForbidden();

    $signedUrl = URL::temporarySignedRoute("make.revisor", now()->addMinutes(30), [
        "user" => $user,
    ]);

    $this->get($signedUrl)
        ->assertOk()
        ->assertSee($user->email);

    $this->post($signedUrl)
        ->assertRedirect(route("homepage"));

    expect($user->fresh()->is_revisor)->toBeTrue();
});
