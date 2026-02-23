<form action="{{route("setFlags",$lang)}}" method="POST">
    @csrf
    <button class="btn" type="submit">
        <img src="{{asset("vendor/blade-flags/country-" . $lang . ".svg")}}" class="flags" alt="">
    </button>
</form>