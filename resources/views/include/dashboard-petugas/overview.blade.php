<div class="overview">
    <div class="row">

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="overview-icon">
                        <span>
                            <i>
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="#0C96C5" d="M5,15L4.4,14.5C2.4,12.6 1,11.4 1,9.9C1,8.7 2,7.7 3.2,7.7C3.9,7.7 4.6,8 5,8.5C5.4,8 6.1,7.7 6.8,7.7C8,7.7 9,8.6 9,9.9C9,11.4 7.6,12.6 5.6,14.5L5,15M15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4M15,10.1A2.1,2.1 0 0,1 12.9,8A2.1,2.1 0 0,1 15,5.9C16.16,5.9 17.1,6.84 17.1,8C17.1,9.16 16.16,10.1 15,10.1M15,13C12.33,13 7,14.33 7,17V20H23V17C23,14.33 17.67,13 15,13M21.1,18.1H8.9V17C8.9,16.36 12,14.9 15,14.9C17.97,14.9 21.1,16.36 21.1,17V18.1Z" />
                                </svg>
                            </i>
                        </span>
                    </div>
                    <h6><small>Jumlah Pasien</small></h6>
                    <h5><b>{{ $count_pasien }} Pasien</b></h5>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="overview-icon">
                        <span>
                            <i>
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="#0C96C5" d="M12,5A3.5,3.5 0 0,0 8.5,8.5A3.5,3.5 0 0,0 12,12A3.5,3.5 0 0,0 15.5,8.5A3.5,3.5 0 0,0 12,5M12,7A1.5,1.5 0 0,1 13.5,8.5A1.5,1.5 0 0,1 12,10A1.5,1.5 0 0,1 10.5,8.5A1.5,1.5 0 0,1 12,7M5.5,8A2.5,2.5 0 0,0 3,10.5C3,11.44 3.53,12.25 4.29,12.68C4.65,12.88 5.06,13 5.5,13C5.94,13 6.35,12.88 6.71,12.68C7.08,12.47 7.39,12.17 7.62,11.81C6.89,10.86 6.5,9.7 6.5,8.5C6.5,8.41 6.5,8.31 6.5,8.22C6.2,8.08 5.86,8 5.5,8M18.5,8C18.14,8 17.8,8.08 17.5,8.22C17.5,8.31 17.5,8.41 17.5,8.5C17.5,9.7 17.11,10.86 16.38,11.81C16.5,12 16.63,12.15 16.78,12.3C16.94,12.45 17.1,12.58 17.29,12.68C17.65,12.88 18.06,13 18.5,13C18.94,13 19.35,12.88 19.71,12.68C20.47,12.25 21,11.44 21,10.5A2.5,2.5 0 0,0 18.5,8M12,14C9.66,14 5,15.17 5,17.5V19H19V17.5C19,15.17 14.34,14 12,14M4.71,14.55C2.78,14.78 0,15.76 0,17.5V19H3V17.07C3,16.06 3.69,15.22 4.71,14.55M19.29,14.55C20.31,15.22 21,16.06 21,17.07V19H24V17.5C24,15.76 21.22,14.78 19.29,14.55M12,16C13.53,16 15.24,16.5 16.23,17H7.77C8.76,16.5 10.47,16 12,16Z" />
                            </svg>
                            </i>
                        </span>
                    </div>
                    <h6><small>Jumlah Antrian</small></h6>
                    <h5><b>{{ $count_antrian }} Antrian</b></h5>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="overview-icon">
                        <span>
                            <i>
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="#0C96C5" d="M2,22V7A1,1 0 0,1 3,6H7V2H17V6H21A1,1 0 0,1 22,7V22H14V17H10V22H2M9,4V10H11V8H13V10H15V4H13V6H11V4H9M4,20H8V17H4V20M4,15H8V12H4V15M16,20H20V17H16V20M16,15H20V12H16V15M10,15H14V12H10V15Z" />
                                </svg>
                            </i>
                        </span>
                    </div>
                    <h6><small>Jumlah Kunjungan</small></h6>
                    <h5><b>{{ $count_kunjungan }} Kunjungan</b></h5>
                </div>
            </div>
        </div>

    </div>
</div>