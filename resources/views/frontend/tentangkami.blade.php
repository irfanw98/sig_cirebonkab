@extends('frontend_master')

@section('header')
<link rel="stylesheet" href="{{ asset('css/frontend/tentangkami/style.css') }}">
@endsection

@section('content')
<section class="tentangkami">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @foreach($tentangkamis as $tentangkami)
                            <h3>Kabupaten Cirebon</h3>
                            <img src="{{ asset('storage/tentangkami') }}/{{ $tentangkami->foto }}" alt="kantor-bupati">
                            <p>{!! $tentangkami->deskripsi !!}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection