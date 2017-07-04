<div class="bg-image" style="background-image: url('{{ asset("assets/img/photos/photo6@2x.jpg")  }}');">
    <div class="block-content bg-primary-dark-op text-center overflow-hidden">
        <div class="push-30-t push animated fadeInDown">
            <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ Auth::user()->profile->profile_pic ? Storage::url(Auth::user()->profile->profile_pic) : asset('assets/img/avatars/avatar10.jpg') }}" alt="">
            @if(Auth::user()->profile->profile_pic == '')
                <br><br>
                <a href="{{ route('profile.edit') }}" class="btn btn-sm text-white btn-danger">update photo</a>
            @endif
        </div>
        <div class="push-30 animated fadeInUp">
            <h2 class="h4 font-w600 text-white push-5 text-capitalize">{{ Auth::user()->fullname() }}</h2>
            <h3 class="h5 text-gray">{{ Request::is('home') ? 'Dashboard' : 'Profile' }}</h3>
        </div>
    </div>
</div>
<!-- Stats -->
<div class="block-content text-center">
    <div class="row items-push text-uppercase">
        <div class="col-xs-6">
            <div class="font-w600 text-gray-darker animated fadeIn">Crypto</div>
            <a class="animated flipInX btn btn-primary btn-rounded" href="javascript:void(0)" data-toggle="modal" data-target="#modal-buy">BUY</a>
        </div>
        <div class="col-xs-6">
            <div class="font-w600 text-gray-darker animated fadeIn">Crypto</div>
            <a class="animated flpInX btn btn-danger btn-rounded" href="javascript:void(0)" data-toggle="modal" data-target="#modal-sell">SELL</a>
        </div>
    </div>
</div>
<!-- END Stats -->