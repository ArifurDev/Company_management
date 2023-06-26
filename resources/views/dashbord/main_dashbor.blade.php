
@if (Auth::user()->role === 'admin')
<div class="row">

</div>


<div class="row">
  <div class="col-sm-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h5>Total Empolyee</h5>
        <div class="row">
          <div class="col-8 col-sm-12 col-xl-8 my-auto">
            <div class="d-flex d-sm-block d-md-flex align-items-center">
              <h2 class="m-0">{{ $total_empolyee }}</h2>

            </div>

          </div>
          <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
            <i class="icon-lg mdi mdi-account-box text-primary ms-auto"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h5>Incoming Card</h5>
        <div class="row">
          <div class="col-8 col-sm-12 col-xl-8 my-auto">
              @php
              $total_card= 0;
              @endphp
               @foreach ($empolyees as $empolyee)
               <input type="number" value="{{ $empolyee->incoming_card }}" hidden>
               @php
                   $total_card= $total_card + $empolyee->incoming_card;
               @endphp
              @endforeach
           <h3 class="mb-0">{{ $total_card }} tk</h3>
          </div>
          <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
            <i class="icon-lg mdi mdi-wallet-travel text-danger ms-auto"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h5>Incoming Cash</h5>
        <div class="row">
          <div class="col-8 col-sm-12 col-xl-8 my-auto">
              @php
              $total_cash= 0;
              @endphp
               @foreach ($empolyees as $empolyee)
               <input type="number" value="{{ $empolyee->incoming_cash }}" hidden>
               @php
                   $total_cash= $total_cash + $empolyee->incoming_cash;
               @endphp
              @endforeach
           <h3 class="mb-0">{{ $total_cash }} tk</h3>
          </div>
          <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
            <i class="icon-lg mdi mdi-monitor text-success ms-auto"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              @php
              $daily_cost = 0;
              @endphp
               @foreach ($adminriports as $adminriport)
                  <input type="number" value="{{ $adminriport->total }}" hidden>
                  @php
                      $daily_cost = $daily_cost + $adminriport->total;
                  @endphp
               @endforeach
            <h3 class="mb-0">{{ $daily_cost }} tk</h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success ">
              <span class="mdi mdi-cash-usd icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Admin Daily Cost</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
               @php
               $total_cash= 0;
               @endphp
                @foreach ($empolyees as $empolyee)
                <input type="number" value="{{ $empolyee->cash }}" hidden>
                @php
                    $total_cash= $total_cash + $empolyee->cash;
                @endphp
               @endforeach
            <h3 class="mb-0">{{ $total_cash }} tk</h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success">
              <span class="mdi mdi-arrow-top-right icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Daily Cash</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              @php
                 $total_incoming = 0;
              @endphp
              @foreach ($empolyees as $empolyee)
                  <input type="number" value="{{ $empolyee->incoming }}" hidden>
                  @php
                     $total_incoming = $total_incoming + $empolyee->incoming;
                  @endphp
              @endforeach
              <h3 class="mb-0">{{ $total_incoming }} tk</h3>

            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-danger">
              <span class="mdi mdi-arrow-bottom-left icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Daily Incoming</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              @php
                $total_outgoing = 0;
              @endphp
              @foreach ($empolyees as $empolyee)
                  <input type="number" value="{{ $empolyee->outgoing }}" hidden>
                  @php
                      $total_outgoing = $total_outgoing + $empolyee->outgoing;
                  @endphp
              @endforeach
              <h3 class="mb-0">{{ $total_outgoing }} tk</h3>

            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success ">
              <span class="mdi mdi-arrow-top-right icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Daily Outgoing</h6>
      </div>
    </div>
  </div>
</div>
@endif


@if (Auth::user()->role != 'assistant')
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
                <a class="btn btn-info" href="{{ route('daily.comopany.reports') }}">Filter</a>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-danger">
              <span class="mdi mdi-account-search"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Search Company Information</h6>
      </div>
    </div>
  </div>
  @endif

  @if (Auth::user()->role == 'assistant')
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">

            </div>
          </div>
          
        </div>
        <h6 class="text-muted font-weight-normal">welcome Assistant</h6>
      </div>
    </div>
  </div>
  @endif
