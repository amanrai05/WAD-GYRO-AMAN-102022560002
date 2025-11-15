<!-- 1. Connect the Dashboard.blade.php file with dashapp.blade.php -->
@extends('layouts/dashapp')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="dashboard-container">
    <div class="dashboard-card position-relative">
        <div class="animated-bg"></div>

        <!-- 2. Fill the href attribute value to direct the user to the profile page -->
        <a href="{{ url('/profile') }}" class="btn-profile-top">
            <i class="bi bi-person-circle me-1"></i> View Profile
        </a>

        <div class="dashboard-body">
            <div class="dashboard-left">
                <div class="logo-wrapper">
                    <div class="logo-ring ring-1"></div>
                    <div class="logo-ring ring-2"></div>
                    <div class="logo-center">
                        <!-- 3. Fill the src attribute value to display the EAD logo -->
                        <img src="{{ asset('images/logo-ead.png') }}" alt="Logo EAD">
                    </div>
                </div>
            </div>

            <div class="dashboard-right">
                <div class="greeting-box">
                    <h1 class="greeting-title">
                        <!-- 4. Call the variable from the controller to display the greeting -->
                        {{ $salam }},
                        <span class="highlight-name">
                            <!-- 5. Call the variable from the controller to display the name -->
                            {{ $mahasiswa->nama }}
                        </span>
                        <span class="wave">👋</span>
                    </h1>
                    <p class="greeting-sub">Welcome to the EAD Practicum Dashboard</p>
                </div>

                <div class="info-grid">
                    <div class="info-card fade-in delay-1">
                        <div class="icon-wrapper primary">
                            <i class="bi bi-clock-fill"></i>
                        </div>
                        <div class="info-text">
                            <p class="info-label">ACCESS TIME</p>
                            <h4 class="info-value">
                                <!-- 6. Call the variable from the controller to display the access time -->
                                {{ $accessTime }} WIB
                            </h4>
                        </div>
                    </div>

                    <div class="info-card fade-in delay-2">
                        <div class="icon-wrapper secondary">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>
                        <div class="info-text">
                            <p class="info-label">ACCESS DATE</p>
                            <h4 class="info-value">
                                <!-- 7. Call the variable from the controller to display the access date -->
                                {{ $tanggal }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

