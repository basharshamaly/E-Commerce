<div>
    <div class="tab">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link  text-blue {{ $tab=='general_settings' ? 'active':'' }} " wire:click.prevent='selectTab("general_settings")' data-toggle="tab" href="#general_settings" role="tab" aria-selected="true">General Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-blue {{ $tab=='logo_favicon' ? 'active':'' }}" wire:click.prevent='selectTab("logo_favicon")' data-toggle="tab" href="#logo_favicon" role="tab" aria-selected="false">Logo && Favicon</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-blue {{ $tab=='social_network' ? 'active':'' }}" wire:click.prevent='selectTab("social_network")' data-toggle="tab" href="#social_network" role="tab" aria-selected="false">Social Network</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-blue {{ $tab=='payment_method' ? 'active':'' }}" wire:click.prevent='selectTab("payment_method")' data-toggle="tab" href="#payment_method" role="tab" aria-selected="false">Payment Method</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade {{ $tab=='general_settings' ? 'active show':'' }} " id="general_settings" role="tabpanel">
                <div class="pd-20">
                <form wire:submit.prevent='updateGeneralSettings()'>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for=""><b>Site Name </b></label>
                                <input type="text" class="form-control" wire:model.defer='site_name' placeholder="Enter Site Name ">
                                @error('site_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">

                                <label for=""><b>Site Email </b></label>
                                <input type="email" class="form-control" wire:model.defer='site_email' placeholder="Enter Site Email ">
                                @error('site_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for=""><b>Site phone </b></label>
                                <input type="text" class="form-control" wire:model.defer='site_phone' placeholder="Enter Site Phone ">
                                @error('site_phone')
                                    <span class="text-denger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">

                                <label for=""><b>Site meta keywords </b></label>
                                <input type="text" class="form-control" wire:model.defer='site_meta_keywords' placeholder="Enter  site_meta_keywords ">
                                @error('site_meta_keywords')
                                    <span class="text-denger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Site Address</label>
                        <input type="text" wire:model.defer="site_address" class="form-control" placeholder="Enter Site Address">
                        @error('site_address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Site meta Decription </label>
                        <textarea wire:model.defer='site_meta_description' cols="30" rows="10" placeholder="Enter site_meta_description" class="form-control"></textarea>
                        @error('site_meta_description')
                            <span class="text-denger">{{ $message }}</span>
                        @enderror
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Save Change </button>
                </form>
                </div>
            </div>
            <div class="tab-pane fade {{ $tab=='logo_favicon' ? 'active show':'' }} " id="logo_favicon" role="tabpanel">
                <div class="pd-20">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Site Logo</h5>
                            <div class="mb-2 mt-1" style="max-width: 200px;">
                                 <img
                                    wire:ignore
                                   src="{{ $settings && $settings->site_logo
                                    ? asset('images/site/' . $settings->site_logo)
                                    : asset('images/site/logo.png') }}"
                                    class="img-thumbnail"
                                    data-ijab-default-img="/images/site/{{ $site_logo }}"
                                    id="site_logo_image"
                                    alt="Site Logo"
                                  

                                >

                                <form
                                    action="{{ route('admin.change-site-logo') }}"
                                    method="post"
                                    enctype="multipart/form-data"
                                    id="change_site_logo"
                                >
                                    @csrf
                                    <div class="mb-2">
                                        <input
                                            type="file"
                                            name="site_logo"
                                            id="site_logo"
                                            placeholder="Upload image of type PNG or JPG"
                                            class="form-control"
                                            onchange="previewImage(this)"

                                        >


                                        @error('site_logo')
                                            <span class="text-danger error-text">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Change Logo</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Site FavIcon</h5>
                            <div class="mb-2 mt-1" style="max-width: 200px">
                                <img wire:ignore   src="{{ $settings && $settings->site_favicon
                                ? asset('images/site/' . $settings->site_favicon)
                                : asset('images/site/favicon.png') }}"
                                  class="img-thumbnail"
                                data-ijab-default-img="/images/site/{{ $site_favicon }}"
                                id="site_favicon_image"
                                alt="Site favicon">
                            </div>
                            <form action="{{ route('admin.change-site-favicon') }}" method="post" enctype="multipart/form-data" id="site_favicon_form">
                            @csrf
                            <div class="mb-2">
                                <input type="file" name="site_favicon" id="site_favicon" placeholder="upload image site_favicon" class="form-control">
                                <span class="text-danger error-text"></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Change FavIcon</button>
                        </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade {{ $tab=='social_network' ? 'active show':'' }} " id="social_network" role="tabpanel">
                <div class="pd-20">
                   <form wire:submit.prevent="updateSocialNetworks()" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                            <label for=""><b>Facebook URL</b></label>
                            <input type="text" wire:model.defer="facebook_url" placeholder="enter facebook url" class="form-control">
                            @error('facebook_url')
                                  <div class="text-danger">{{ $message }}</div>
                            @enderror
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                            <label for=""><b>Twiter URL</b></label>
                            <input type="text" wire:model.defer="twiter_url" placeholder="enter twiter url" class="form-control">
                            @error('twiter_url')
                                  <div class="text-danger">{{ $message }}</div>
                            @enderror
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                            <label for=""><b>Instgram URL</b></label>
                            <input type="text" wire:model.defer="instgram_url" placeholder="enter instgram url" class="form-control">
                            @error('instgram_url')
                                  <div class="text-danger">{{ $message }}</div>
                            @enderror
                           </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                            <label for=""><b>Githup URL</b></label>
                            <input type="text" wire:model.defer="github_url" placeholder="enter github_url url" class="form-control">
                            @error('github_url')
                                  <div class="text-danger">{{ $message }}</div>
                            @enderror
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                            <label for=""><b>YoutYope URL</b></label>
                            <input type="text" wire:model.defer="youtyope_url" placeholder="enter youtyope_url url" class="form-control">
                            @error('youtyope_url')
                                  <div class="text-danger">{{ $message }}</div>
                            @enderror
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                            <label for=""><b>LinkedIn URL</b></label>
                            <input type="text" wire:model.defer="linkedin_url" placeholder="enter linkedin_url url" class="form-control">
                            @error('linkedin_url')
                                  <div class="text-danger">{{ $message }}</div>
                            @enderror
                           </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                   </form>
                </div>
            </div>
            <div class="tab-pane fade {{ $tab=='payment_method' ? 'active show':'' }} " id="payment_method" role="tabpanel">
                <div class="pd-20">
                    Payment Method
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
    @endif

    @if(session('error'))
    <script>
        toastr.error("{{ session('error') }}");



    </script>


@endif

@section('sc')
<script>
    function previewImage(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById('site_logo_image').src = e.target.result;

    }
    reader.readAsDataURL(input.files[0]);
}
}

</script>
@endsection

</div>
