<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\BecomeRevisor;
use App\Models\Announce;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function revisors_index()
    {

        $announce = Announce::whereNull("is_accepted")->first();

        $rejected_announces = Announce::where("is_accepted", false)->get();

        $last_announcement = session('last_announcement_id')
            ? Announce::find(session('last_announcement_id'))
            : null;

        return view("revisors.index", compact(
            "announce",
            "last_announcement",
            "rejected_announces"
        ));
    }

    public function accept(Announce $announce)
    {
        $announce->setAccepted(true);
        return redirect()->back()->with(['status' => __('ui.announce_approved'), 'type' => 'success', 'last_announcement_id' => $announce->id]);
    }

    public function reject(Announce $announce)
    {
        $announce->setAccepted(false);
        return redirect()->back()->with(['status' => __('ui.announce_rejected'), 'type' => 'danger', 'last_announcement_id' => $announce->id]);
    }

    public function back(Announce $announce)
    {
        $announce->setAccepted(null);
        return redirect(route('revisors_index'))->with(['status' => __('ui.revision_restored'), 'type' => 'secondary']);
    }

    // funzioni mail
    public function formRevisor()
    {
        return view("mail.becomeRevised");
    }

    public function becomeRevisor(Request $request)
    {
        $validated = $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "email", "max:255"],
            "description" => ["required", "string", "min:20", "max:2000"],
        ]);

        $recipient = config("services.revisor.address") ?? config("mail.from.address");

        Mail::to($recipient)->send(new BecomeRevisor(
            $validated["name"],
            $validated["email"],
            $validated["description"],
            $request->user()
        ));

        return redirect()->route("formRevisor")->with(["status" => __('ui.become_revisor_success')]);
    }

    public function makeRevisor(Request $request, User $user)
    {
        if ($request->isMethod("get")) {
            return view("revisors.confirm-make-revisor", compact("user"));
        }

        if (!$user->is_revisor) {
            $user->forceFill(["is_revisor" => true])->save();
        }

        return redirect()->route("homepage")->with([
            "status" => __('ui.user_now_revisor'),
            "type" => "success",
        ]);
    }
}
