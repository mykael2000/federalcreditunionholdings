<div class="col-12 col-lg-3 col-xl-2 mb-4 mt-3 pr-lg-0">
    <div class="card border h-100">
        <div class="media d-block  d-flex p-3 bg-primary">
            <div class="media-body align-self-center">
                <h5 class="mb-0 w-100"><a href="#" class="text-white">{{ auth('user')->user()->username }}</a></h5>
                <small><a href="#" class="text-white">{{ auth('user')->user()->email }}</a></small>
            </div>
        </div>
        <ul class="list-unstyled inbox-nav  mb-0 py-4">
            <li><a href="{{ route('user.message.index') }}" class="h6 d-block px-3 my-3"><i class="icon-envelope pr-2"></i> Inbox</a></li>
            <li><a href="{{ route('user.message.create') }}" class="h6 d-block px-3  my-3"><i class="icon-plus pr-2"></i> Compose</a></li>
            <li><a href="{{ route('user.message.sent') }}" class="h6 d-block px-3  my-3"><i class="icon-paper-plane pr-2"></i> Sent Message</a></li>
            
        </ul>
        <div class="eagle-divider"></div>
        
    </div>
</div>