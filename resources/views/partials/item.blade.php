<li>
    <div class="list-timeline-time">{{ date('D M jS, Y g:ia', strtotime($t->created_at))  }}</div>
    <i class="fa {{$t->type == 'purchase' ? 'fa-cart-plus' : 'fa-shopping-cart'}} list-timeline-icon bg-flat"></i>
    <div class="list-timeline-content">
        <p class="font-w600"> {{ $t->type =='purchase' ? $t->market->abbr_name . ' Purchased' : $t->market->abbr_name . ' Sold' }} <a href="{{ route('transaction.single', $t->id) }}" class="btn btn-primary btn-xs"> View </a></p>
        <p class="font-s13">Package:  <b>{{ $t->package->name }}</b></p>
        <p class="font-s13">Status:  <b class="text-capitalize">{{ $t->status }}</b></p>
        @if($t->status == 'pending' && $t->market->abbr_name == 'GRC')
			<p>
				<a href="{{ route('convert_to_tbc', $t->id) }}" class="btn btn-danger btn-xs">Move to TBC</a>
			</p>
        @endif
    </div>
</li>