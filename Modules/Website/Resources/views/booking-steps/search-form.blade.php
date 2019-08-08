{{-- <search></search> --}}
<section class="search wow fadeInUp delay-1s" id="search">
    <div class="content">
        <div class="tabs">
        {{-- <ul class="nav nav-pills mb-3 text-center text-uppercase" id="pills-tab" role="tablist">
            <li class="nav-item active"><a class="nav-link" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">Buses</a></li>
            <li class="nav-item"><a class="nav-link" id="pills-new-tab" data-toggle="pill" href="#pills-new" role="tab" aria-controls="pills-new" aria-selected="true">Flights</a></li>
            <li class="nav-item"><a class="nav-link" id="pills-used-tab" data-toggle="pill" href="#pills-used" role="tab" aria-controls="pills-used" aria-selected="true">trains</a></li>
            <li class="nav-item"><a class="nav-link" id="pills-used-tab" data-toggle="pill" href="car-details.html"><i class="fa fa-search"></i></a></li>
        </ul> --}}
        <div class="tab-content sections-contents" id="pills-tabContent">
            <div class="tab-pane fade active in" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"> 

                    {{-- <div class="inline-items search-list">
                        <div class="search-event">
                            <span class="h6 search-friend"> Marie Davidson </span>
                        </div>
                        <span class="search-icon">
                            <svg class="olymp-small-pin-icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-small-pin-icon') }}"></use></svg>
                        </span>
                    </div> --}}

            <form class="form" action="{{route('search-post')}}" method="get"> 
                    @csrf
                <div class="row">
                <div class="level col-md-3 col-sm-3">
                    <svg class="olymp-small-pin-icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-small-pin-icon') }}"></use></svg>
                    <select name="from" required class="selectpicker style-2 show-tick search-input" overflow-x="auto" data-max-options="1" data-live-search="true">
                        <option title="السفر مــن"  placeholder="السفر مــن" value="" data-content=
                        '<div class="inline-items">
                            <div class="h6 search-friend">السفر مــن</div>
                        </div>'>
                        السفر مــن
                        </option>
                        @foreach ($stations as $station)
                            <option title="{{$station->name}}" data-content=
                                '<div class="inline-items"> <div class="h6 search-friend">{{$station->name}}</div> </div>'> {{$station->id}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="level col-md-3 col-sm-3">
                    {{-- <svg class="olymp-small-pin-icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-small-pin-icon') }}"></use></svg>
                    <input class="search-input text-uppercase"  type="text" placeholder="الــي"> --}}
                    <svg class="olymp-small-pin-icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-small-pin-icon') }}"></use></svg>
                    <select name="to" required class="selectpicker style-2 show-tick search-input" overflow-x="auto" data-max-options="1" data-live-search="true">
                        <option title="السفر الــي"  placeholder="السفر الــي" value="" data-content=
                        '<div class="inline-items">
                            <div class="h6 search-friend">السفر الــي</div>
                        </div>'>
                        السفر الــي
                        </option>
                        @foreach ($stations as $station)
                            <option title="{{$station->name}}" data-content=
                                '<div class="inline-items"> <div class="h6 search-friend">{{$station->name}}</div> </div>'> {{$station->id}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="level col-md-3 col-sm-3"> 
                    <svg class="olymp-month-calendar-icon icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-month-calendar-icon') }}"></use></svg>
                    <input name="date" class="search-input text-uppercase"  id="datepicker" type="text" placeholder="التاريــخ (اختياري)">
                </div>
                <div class="search-btn col-md-3 col-sm-3"> 
                    <input class="btn search-submit text-uppercase" id="name" type="submit" value="بحـــث">
                    <svg class="olymp-magnifying-glass-icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon') }}"></use></svg>
                </div>
                </div>
            </form>
            </div>
            <div class="tab-pane fade" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">new</div>
            <div class="tab-pane fade" id="pills-used" role="tabpanel" aria-labelledby="pills-used-tab">used</div>
        </div>
        </div>
    </div>
</section>
{{-- <section class="under-search"></section> --}}