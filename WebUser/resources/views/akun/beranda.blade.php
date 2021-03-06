@extends('layouts.app')

@section('content')
@php
    use App\Http\Controllers\GuzzleController;
    if(!session('filter_booking')){
        GuzzleController::getBooking(Cookie::get('access_token'));
    }
@endphp
@include('inc.navberanda')
        <!-- Masthead-->
        <br>
        <header class="masthead">
            <div class="container d-flex h-100 align-items-center">
                <div class="container">
                <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                    <div class="col-lg-3">
                        <div class="bg-darkblue text-center h-100 pt-5 pb-5 pl-5 pr-5 cropfotoprofil">
                            <img src="{{ Cookie::get('address_web_server').Cookie::get('foto') }}" alt="" />
                        </div>
                    </div>
                        <div class="col-lg-6">
                        <div class="bg-darkblue text-center h-100 pt-5 pb-5">
                            <div class="d-flex h-100">
                                <div class="w-100 my-auto text-center justify-content-center">
                                    <h4 class="pl-5 pr-5 text-white mx-auto text-lg-left">{{ Cookie::get('nama') }}</h4>
                                    <h5 class="pl-5 pr-5 text-white text-lg-left">{{ Cookie::get('nip') }}</h5>
                                    <p class="pl-5 pr-5 mb-0 text-white-50 text-lg-left">{{ Cookie::get('jabatan') }}</p>
                                    <p class="pl-5 pr-5 mb-0 text-white-50 text-lg-left">{{ Cookie::get('bidang') }}</p>
                                    <hr class="d-none d-lg-block mb-5 ml-0" />
                                    <a href="{{ URL::to('bookings/status') }}"><button type="button" class="btn  btn-info bg-birumuda text-center col-lg-5">Pinjam Ruangan</button></a>
                                    <a href="{{ URL::to('profile/edit') }}"><button type="button" class="btn btn-info bg-toska text-center col-lg-5">Edit</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </header>

        <section class="projects-section bg-light pt-5 pb-5" id="">
            <div class="container">
                <!-- Featured Project Row-->
                <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/building 2.png" alt="" /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Dinas Komunikasi dan Informatika Jawa Timur</h4>
                            <p class="text-black-50 mb-0">Dinas Komunikasi dan Informatika Jawa Timur</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="Jadwal-section bg-light" id="Jadwal">
            <br><br><label for="" style="align-items: center; font-size: 32px"> Jadwal Peminjaman</label>
            <br><label style="align-items: center; font-size: 18px" class="text-primary">Pencarian Peminjaman</label><br><br>
            <div class="container p-b-11">
                <form method="POST" action="{{ route('filter_bookings')}}">
                    @csrf
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <span class="txt1 p-b-11">
                                Nama Ruangan
                            </span>
                            <div class="mt-3 validate-input m-b-36">
                                <select class="custom-select" name="r_id" required>
                                <option value="">Pilih salah satu</option>
                                <option value="1">{{ Cache::get('1_nama')}}</option>
                                <option value="2">{{ Cache::get('2_nama')}}</option>
                                <option value="3">{{ Cache::get('3_nama')}}</option>
                                <option value="4">{{ Cache::get('4_nama')}}</option>
                                <option value="5">{{ Cache::get('5_nama')}}</option>
                                </select>
                                <div class="invalid-feedback">Harus diisi!</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <span class="txt1">
                                Tanggal Pinjam
                            </span>
                        <input value="{{ Cache::get('booking_tanggal_pinjam')}}" name="tanggal_pinjam" type="text" class="mt-3 datepicker-here form-control wrap-input100 validate-input m-b-36" data-language='en' placeholder="Gunakan kalender pop-up" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <span class="txt1 p-b-11">
                                Waktu Mulai
                            </span>
                            <div class="mt-3 d-flex align-items-center">
                                <input value="{{ Cache::get('booking_waktu_mulai')}}" id="timepkr" name="waktu_mulai" style="float:left;" class="wrap-input100 form-control" placeholder="HH:MM" required />
                                <button type="button" class="btn btn-primary" onclick="showpickers('timepkr',24)" style="height:40px;width:20%;float:left;"></button>
                            </div>
                        <div class="timepicker"></div> 
                        </div>
                    </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <span class="txt1 p-b-11">
                            Waktu Selesai
                        </span>
                        <div class="mt-3 d-flex align-items-center">
                            <input value="{{ Cache::get('booking_waktu_selesai')}}" id="timepkr1" name="waktu_selesai" style="float:left;" class="wrap-input100 form-control" placeholder="HH:MM" required/>
                            <button type="button" class="btn btn-primary" onclick="showpickers('timepkr1',24)" style="height:40px;width:20%;float:left;"></button>
                          </div>
                      <div class="timepicker1"></div> 
                    </div>
                </div>
                <div class="col-md-2 mt-4">
                    <button type="submit" class="btn btn-info btn-lg">Cari</button>
                </div>
            </form>
 
            <div class="container mt-2">
                <br><br>
                {{-- <div class="row justify-content-center"> --}}
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Ruangan</th>
                            <th scope="col">Tanggal dan Waktu</th>
                            <th scope="col">Bidang</th>
                            <th scope="col">Nama Peminjam</th>
                            <th scope="col">Bukti Peminjaman</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                            @if(count(Cache::get('bookings'.Cookie::get('access_token'))['bookings']) != 0)
                            <?php $i=0 ?>
                            @foreach (Cache::get('bookings'.Cookie::get('access_token'))['bookings'] as $booking)         
                                <th scope="row"> <div class="cropfotoprofil"> <img style="max-height: 60px; max-width: 200px;" class="rounded" src="{{ Cookie::get('address_web_server').$booking['r_foto'] }}" alt=""> </div></th>
                                <td>{{ $booking["r_nama"]}}</td>
                                <td>{{ $booking["tanggal_pinjam"] }} <br> {{ substr($booking["waktu_mulai"],0,5) }} s/d {{ substr($booking["waktu_selesai"],0,5) }}</td>
                                <td>{{ $booking["d_nama"]}}</td> 
                                <td>{{ $booking["u_nama"] }}</td>
                                <td><a href="" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg-bukti{{$i+=1}} ">
                                    <svg width="2em" height="2em" viewBox="0 0 16 13" class="bi bi-file-earmark-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                    </a>
                                </td>
                            </tr>
                              
                        {{-- </div> --}}
                            @endforeach
                            @else
                                <tr>
                                    <td align="center" colspan="8"><p class="text-info">Tidak ada peminjaman ruang</p></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <?php $i=0 ?>
            @foreach (Cache::get('bookings'.Cookie::get('access_token'))['bookings'] as $booking)
            <div class="modal fade bd-example-modal-lg-bukti{{$i+=1}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="text-center pt-3 pb-1">Bukti Peminjaman</h1>
                                <hr>
                                <div class="row justify-content-center">
                                    <div class="col-lg-10 h-100 pb-5 pr-5 pl-5 cropfotoprofil">
                                        <img src="{{ Cookie::get('address_web_server').$booking["file"]}}" alt="Image">
                                    </div>
                                </div>
                                <div class="row justify-content-center pb-5">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </section>

        <!-- Projects-->
        <section class="projects-section bg-light pt-5 pb-5" id="projects">
            <div class="container">
                <!-- Project First Row-->
                <div class="row justify-content-center no-gutters cropcenter mb-5 mb-lg-0" >
                    <div class="col-lg-6"><img class="img-fluid " style="max-height: 400px; min-height: 100px;" src="{{ Cookie::get('address_web_server').Cache::get('1_foto') }}" alt="" /></div>
                    <div class="col-lg-6">
                        <div class="bg-darkblue text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">{{ Cache::get('1_nama')}}</h4>
                                    <p class="mb-0 text-white-50">Kapasitas : {{ Cache::get('1_kapasitas') }} orang</p>
                                    <a href="#" class="text-white-50"  data-toggle="modal" data-target=".bd-example-modal-lg1" >Selengkapnya &rarr;</a> 
                                    <hr class="d-none d-lg-block mb-0 ml-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="row">
                                <div class="d-lg-block">
                                    <h1 class="text-center pt-3 pb-1">Detail ruangan</h1>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-4 pb-5 pr-5 pl-5">
                                            <div><img src="{{ Cookie::get('address_web_server').Cache::get('1_foto') }}" alt="Image" class="img-fluid"></div>
                                        
                                        </div>
                                        <div class="col-lg-7 pl-lg-10">
                                            <div class="mb-5 text-lg-left">
                                                <h3 class="text-black mb-4">{{ Cache::get('1_nama') }}</h3>
                                                <p>Lokasi : Lantai {{ Cache::get('1_lantai') }}</p>
                                                <p>Fasilitas : {{ Cache::get('1_fasilitas') }}</p>
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Second Row-->
                <div class="row justify-content-center no-gutters cropcenter ">
                    <div class="col-lg-6"><img class="img-fluid" style="max-height: 400px; min-height: 100px;" src="{{ Cookie::get('address_web_server').Cache::get('2_foto') }}" alt="" /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-darkblue text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">{{ Cache::get('2_nama') }}</h4>
                                    <p class="mb-0 text-white-50">Kapasitas : {{ Cache::get('2_kapasitas') }} orang</p>
                                    <a href="#" class="text-white-50"  data-toggle="modal" data-target=".bd-example-modal-lg2" >Selengkapnya &rarr;</a> 
                                    <hr class="d-none d-lg-block mb-0 mr-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="row">
                                <div class="d-lg-block">
                                    <h1 class="text-center pt-3 pb-1">Detail ruangan</h1>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-4 pb-5 pr-5 pl-5">
                                            <div><img src="{{ Cookie::get('address_web_server').Cache::get('2_foto') }}" alt="Image" class="img-fluid"></div>
                                        
                                        </div>
                                        <div class="col-lg-7 pl-lg-10">
                                            <div class="mb-5 text-lg-left">
                                                <h3 class="text-black mb-4">{{ Cache::get('2_nama') }}</h3>
                                                <p>Lokasi : Lantai {{ Cache::get('2_lantai') }}</p>
                                                <p>Fasilitas : {{ Cache::get('2_fasilitas') }}</p>
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Third Row-->
                <div class="row justify-content-center no-gutters cropcenter mb-5 mb-lg-0" >
                    <div class="col-lg-6"><img class="img-fluid " style="max-height: 400px; min-height: 100px;" src="{{ Cookie::get('address_web_server').Cache::get('3_foto') }}" alt="" /></div>
                    <div class="col-lg-6">
                        <div class="bg-darkblue text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">{{ Cache::get('3_nama')}}</h4>
                                    <p class="mb-0 text-white-50">Kapasitas : {{ Cache::get('3_kapasitas') }} orang</p>
                                    <a href="#" class="text-white-50"  data-toggle="modal" data-target=".bd-example-modal-lg3" >Selengkapnya &rarr;</a> 
                                    <hr class="d-none d-lg-block mb-0 ml-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="row">
                                <div class="d-lg-block">
                                    <h1 class="text-center pt-3 pb-1">Detail ruangan</h1>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-4 pb-5 pr-5 pl-5">
                                            <div><img src="{{ Cookie::get('address_web_server').Cache::get('3_foto') }}" alt="Image" class="img-fluid"></div>
                                        
                                        </div>
                                        <div class="col-lg-7 pl-lg-10">
                                            <div class="mb-5 text-lg-left">
                                                <h3 class="text-black mb-4">{{ Cache::get('3_nama') }}</h3>
                                                <p>Lokasi : Lantai {{ Cache::get('3_lantai') }}</p>
                                                <p>Fasilitas : {{ Cache::get('3_fasilitas') }}</p>
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Fourth Row-->
                <div class="row justify-content-center no-gutters cropcenter ">
                    <div class="col-lg-6"><img class="img-fluid" style="max-height: 400px; min-height: 100px;" src="{{ Cookie::get('address_web_server').Cache::get('4_foto') }}" alt="" /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-darkblue text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">{{ Cache::get('4_nama') }}</h4>
                                    <p class="mb-0 text-white-50">Kapasitas : {{ Cache::get('4_kapasitas') }} orang</p>
                                    <a href="#" class="text-white-50"  data-toggle="modal" data-target=".bd-example-modal-lg4" >Selengkapnya &rarr;</a> 
                                    <hr class="d-none d-lg-block mb-0 mr-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="row">
                                <div class="d-lg-block">
                                    <h1 class="text-center pt-3 pb-1">Detail ruangan</h1>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-4 pb-5 pr-5 pl-5">
                                            <div><img src="{{ Cookie::get('address_web_server').Cache::get('4_foto') }}" alt="Image" class="img-fluid"></div>
                                        
                                        </div>
                                        <div class="col-lg-7 pl-lg-10">
                                            <div class="mb-5 text-lg-left">
                                                <h3 class="text-black mb-4">{{ Cache::get('4_nama') }}</h3>
                                                <p>Lokasi : Lantai {{ Cache::get('4_lantai') }}</p>
                                                <p>Fasilitas : {{ Cache::get('4_fasilitas') }}</p>
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Fifth Row-->
                <div class="row justify-content-center no-gutters cropcenter mb-5 mb-lg-0" >
                    <div class="col-lg-6"><img class="img-fluid " style="max-height: 400px; min-height: 100px;" src="{{ Cookie::get('address_web_server').Cache::get('5_foto') }}" alt="" /></div>
                    <div class="col-lg-6">
                        <div class="bg-darkblue text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">{{ Cache::get('5_nama')}}</h4>
                                    <p class="mb-0 text-white-50">Kapasitas : {{ Cache::get('5_kapasitas') }} orang</p>
                                    <a href="#" class="text-white-50"  data-toggle="modal" data-target=".bd-example-modal-lg5" >Selengkapnya &rarr;</a> 
                                    <hr class="d-none d-lg-block mb-0 ml-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="row">
                                <div class="d-lg-block">
                                    <h1 class="text-center pt-3 pb-1">Detail ruangan</h1>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-4 pb-5 pr-5 pl-5">
                                            <div><img src="{{ Cookie::get('address_web_server').Cache::get('5_foto') }}" alt="Image" class="img-fluid"></div>
                                        </div>
                                        <div class="col-lg-7 pl-lg-10">
                                            <div class="mb-5 text-lg-left">
                                                <h3 class="text-black mb-4">{{ Cache::get('5_nama') }}</h3>
                                                <p>Lokasi : Lantai {{ Cache::get('5_lantai') }}</p>
                                                <p>Fasilitas : {{ Cache::get('5_fasilitas') }}</p>
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@include('inc.contactsection')
        
@endsection