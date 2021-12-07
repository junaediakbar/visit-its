@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row m-5 justify-content-center">

        <div class="pt-4 pb-2">
            <div
            class="
                d-flex
                justify-content-center
                align-items-center
                flex-column
                pull-left
                "
                >
                <img
                class="img-thumbnail bg-none border-0 w-75"
                src="{{ asset('assets/img_about.svg')}}"
                alt="Avatar"
                />
            </div>

        </div>
        <div class="pt-4 pb-2">
            <h2 class="text-primary font-weight-bold">E-VITS</h2>
            <p>
                E-VITS merupakan layanan 24 jam 
                untuk penerimaan tamu kunjugan pada Kampus ITS.
                Dengan adanya E-VITS ini diharapkan dapat memudahkan 
                pengunjung maupun administrator, sehingga tamu undangan dapat 
                terdata dengan baik.
            </p>
              @if(str_contains(url()->previous(), 'user'))
              <a class="btn btn-primary bg-primary"  href="/user/kunjungans/create">Visit Now!</a>
              @elseif(str_contains(url()->previous(), 'admin'))
              <a class="btn btn-primary bg-primary"  href="/admin/kunjungans/create">Visit Now!</a>
              @else
              <a class="btn btn-primary bg-primary"  href="/">Visit Now!</a>
              @endif
        </div>
    </div>
        @endsection
