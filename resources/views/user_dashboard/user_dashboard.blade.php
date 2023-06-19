@extends('layout.user_dashboard')

@section('style')

@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xl-12 col-12">
            <div class="box bg-info bg-img" style="background-image: url(/BackTheme/images/bg-1.png)">
                <div class="box-body text-center">
                    <img src="/FrontTheme/img/carousel-1.png" class="mt-50" alt="" />
                    <div class="max-w-700 mx-auto">
                        <h1 id="countdown" data-target="{{ $targetDate }}" style="font-size: 350%" class="text-white mb-20 font-weight-700">05 Days : 06 Hour : 35 Min </h1>
                        <p class="text-white-100 mb-10 font-size-20">To go for Mr. {{ Auth::user()->name}}'s bike servicing at {{ config('app.name') }}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    // Get the target date from the data attribute
    var targetDate = moment(document.getElementById('countdown').dataset.target);

    function updateCountdown() {
        var currentDate = moment();
        var countdown = moment.duration(targetDate.diff(currentDate));

        // Format the countdown display
        var days = countdown.days();
        var hours = countdown.hours();
        var minutes = countdown.minutes();
        var seconds = countdown.seconds();

        var countdownDisplay = days + ' days ' +
                            hours + ' hours ' +
                            minutes + ' minutes ' +
                            seconds + ' seconds';

        // Update the countdown element
        document.getElementById('countdown').textContent = countdownDisplay;
    }

    // Update the countdown initially
    updateCountdown();

    // Update the countdown every second
    setInterval(updateCountdown, 1000);

</script>
@endsection
