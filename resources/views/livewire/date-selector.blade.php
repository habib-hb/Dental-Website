<div>
    {{-- In work, do what you enjoy. --}}

    <p>Date Selector Hah</p>

    @foreach ($datesArray as $date)

        <p>
            <span>{{ $date['day'] }} - </span>
            <span>{{ $date['month'] }} - </span>
            <span>{{ $date['year'] }} - </span>
            <span>{{ $date['month_name'] }}</span>
        </p>

    @endforeach

</div>
