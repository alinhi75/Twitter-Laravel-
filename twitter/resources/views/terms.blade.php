@extends ('layout.layout')
@section ('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>
    <div class="col-6">
        <h1>Terms of Service</h1>
        <p>These Terms of Service govern your use of our website located at twitter.com (the "Site") and form a binding
            contractual agreement between you, the user of the Site and us, Twitter Inc. ("Twitter"). For that reason,
            these Terms are important and you should read them carefully and contact us with any questions before you
            use the Site. You can contact us at
        </p>
        <p>By using the Site you acknowledge and agree that you have had sufficient chance to read and understand the
            Terms and you agree to be bound by them. If you do not agree to the Terms, please do not use the Site.
        </p>
        <h2>1. License to use the Site</h2>
        <p>Twitter grants you a non-exclusive, revocable, non-transferable, limited license to use the Site in
            accordance with these Terms.
        </p>
    </div>
    <div class="col-3">
       @include('shared.Search-bar')
         @include('shared.follow-box')
    </div>

</div>


    @endsection
