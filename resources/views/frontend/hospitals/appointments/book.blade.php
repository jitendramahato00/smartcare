@include('frontend.hospitals.includes.header')
    
    <!-- ======================================================= -->
    <!-- START: CUSTOM CSS FOR CALENDAR & PAYMENT FORMS -->
    <!-- ======================================================= -->
    <style>
        /* Calendar Styles */
        .card.booking-schedule{border:1px solid #f0f0f0;margin-bottom:1.875rem}.day-slot ul{list-style:none;padding:0;margin:0;display:flex;border-radius:5px;overflow:hidden;border:1px solid #e0e0e0}.day-slot li{flex-grow:1;text-align:center;cursor:pointer;padding:15px 10px;background-color:#fff;border-right:1px solid #e0e0e0;transition:background-color .3s ease,color .3s ease}.day-slot li:last-child{border-right:none}.day-slot li:hover{background-color:#f7f7f7}.day-slot li.active{background-color:#007bff;color:#fff}.day-slot li.active .slot-date,.day-slot li.active span{color:#fff!important}.day-slot li span{display:block;font-weight:600}.day-slot li .slot-date{font-size:13px;color:#757575;margin-top:5px}.schedule-cont h4{text-align:center;font-size:1rem;color:#757575;margin-top:1.5rem;margin-bottom:1rem;font-weight:500}.time-slot ul{list-style:none;padding:0;margin:0;display:flex;flex-wrap:wrap;gap:10px;justify-content:center}.time-slot .timing{display:block;width:100px;text-decoration:none;color:#007bff;border:1px solid #007bff;padding:8px;border-radius:4px;text-align:center;font-weight:500;transition:background-color .2s,color .2s}.time-slot .timing:hover:not(.reserved){background-color:#007bff;color:#fff}.time-slot .timing.selected{background-color:#28a745;color:#fff;border-color:#28a745}.time-slot .timing.reserved{background-color:#f8f9fa;color:#adb5bd;border-color:#dee2e6;cursor:not-allowed;text-decoration:line-through}
        
        /* Payment Gateway Styles */
        .payment-list .payment-radio img.payment-logo {
            width: 60px;
            margin-left: 15px;
            vertical-align: middle;
        }
        .payment-form-fields {
            padding: 20px;
            border: 1px solid #f0f0f0;
            border-radius: 5px;
            margin-top: 10px;
            background-color: #fafafa;
        }
    </style>
    <!-- ======================================================= -->
    <!-- END: CUSTOM CSS -->
    <!-- ======================================================= -->
</head>
<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
    
        <!-- Header (Your template's header) -->
        <header class="header">
            <!-- ... your header HTML ... -->
        </header>
        <!-- /Header -->
        
        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <h2 class="breadcrumb-title">Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->
        
        <!-- Page Content -->
        <div class="content">
            <div class="container">
                <form action="your_backend_processing_url" method="POST"> <!-- IMPORTANT: Add your form action here -->
                    @csrf <!-- For Laravel -->
                    <div class="row">
                        <div class="col-md-7 col-lg-8">
                            
                            <!-- 1. DYNAMIC CALENDAR WIDGET -->
                            <div class="card booking-schedule">
                                <div class="card-header"><h4 class="card-title">1. Select Appointment Slot</h4></div>
                                <div class="card-body">
                                    <div class="day-slot"><ul id="week-calendar"></ul></div>
                                    <div class="schedule-cont">
                                        <h4 id="selected-date-display"></h4>
                                        <div class="time-slot"><ul id="time-slot-container"></ul></div>
                                    </div>
                                    <!-- Hidden fields to store selected date and time for backend -->
                                    <input type="hidden" name="appointment_date" id="appointment_date_input">
                                    <input type="hidden" name="appointment_time" id="appointment_time_input">
                                </div>
                            </div>
                            <!-- /DYNAMIC CALENDAR WIDGET -->
                            
                            <!-- 2. PERSONAL INFORMATION -->
                            <div class="card">
                                <div class="card-header"><h4 class="card-title">2. Personal Information</h4></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6"><div class="form-group card-label"><label>First Name</label><input class="form-control" type="text" name="first_name" required></div></div>
                                        <div class="col-md-6"><div class="form-group card-label"><label>Last Name</label><input class="form-control" type="text" name="last_name" required></div></div>
                                        <div class="col-md-6"><div class="form-group card-label"><label>Email</label><input class="form-control" type="email" name="email" required></div></div>
                                        <div class="col-md-6"><div class="form-group card-label"><label>Phone</label><input class="form-control" type="text" name="phone" required></div></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /PERSONAL INFORMATION -->

                            <!-- 3. PAYMENT METHOD -->
                            <div class="card">
                                <div class="card-header"><h4 class="card-title">3. Payment Method</h4></div>
                                <div class="card-body">
                                    <div class="payment-widget">
                                        
                                        <!-- Khalti Payment -->
                                        <div class="payment-list">
                                            <label class="payment-radio"><input type="radio" name="payment_method" value="khalti" data-target="#khalti-fields" checked><span class="checkmark"></span> Pay with Khalti <img src="https://khalti-static.s3.ap-south-1.amazonaws.com/Images/khalti-logo.png" alt="Khalti" class="payment-logo"></label>
                                            <div id="khalti-fields" class="payment-form-fields">
                                                <div class="form-group card-label"><label>Khalti Mobile Number</label><input class="form-control" type="text" placeholder="98XXXXXXXX"></div>
                                                <small class="form-text text-muted">You will be redirected to Khalti for secure payment.</small>
                                            </div>
                                        </div>

                                        <!-- eSewa Payment -->
                                        <div class="payment-list">
                                            <label class="payment-radio"><input type="radio" name="payment_method" value="esewa" data-target="#esewa-fields"><span class="checkmark"></span> Pay with eSewa <img src="https://esewa.com.np/common/images/logo-esewa.png" alt="eSewa" class="payment-logo"></label>
                                            <div id="esewa-fields" class="payment-form-fields" style="display:none;">
                                                <div class="form-group card-label"><label>eSewa ID</label><input class="form-control" type="text" placeholder="Your eSewa Mobile or Email"></div>
                                                <small class="form-text text-muted">You will be redirected to eSewa for secure payment.</small>
                                            </div>
                                        </div>

                                        <!-- Credit Card Payment -->
                                        <div class="payment-list">
                                            <label class="payment-radio"><input type="radio" name="payment_method" value="credit_card" data-target="#credit-card-fields"><span class="checkmark"></span> Credit Card</label>
                                            <div id="credit-card-fields" class="payment-form-fields" style="display:none;">
                                                <div class="row">
                                                    <div class="col-md-6"><div class="form-group card-label"><label>Name on Card</label><input class="form-control" type="text"></div></div>
                                                    <div class="col-md-6"><div class="form-group card-label"><label>Card Number</label><input class="form-control" placeholder="1234 5678 9876 5432" type="text"></div></div>
                                                    <div class="col-md-4"><div class="form-group card-label"><label>Expiry Month</label><input class="form-control" placeholder="MM" type="text"></div></div>
                                                    <div class="col-md-4"><div class="form-group card-label"><label>Expiry Year</label><input class="form-control" placeholder="YYYY" type="text"></div></div>
                                                    <div class="col-md-4"><div class="form-group card-label"><label>CVV</label><input class="form-control" type="text"></div></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Paypal Payment -->
                                        <!-- <div class="payment-list">
                                            <label class="payment-radio"><input type="radio" name="payment_method" value="paypal" data-target="#paypal-fields"><span class="checkmark"></span> PayPal</label>
                                            <div id="paypal-fields" class="payment-form-fields" style="display:none;">
                                                <p>You will be redirected to the PayPal website to complete your payment.</p>
                                                <button type="button" class="btn btn-primary">Go to PayPal</button>
                                            </div>
                                        </div> -->

                                        <div class="terms-accept mt-4"><div class="custom-checkbox"><input type="checkbox" id="terms_accept" required><label for="terms_accept"> I have read and accept <a href="#">Terms & Conditions</a></label></div></div>
                                        
                                        <div class="submit-section mt-4"><button type="submit" class="btn btn-primary submit-btn">Confirm and Pay</button></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /PAYMENT METHOD -->
                        </div>
                        
                        <div class="col-md-5 col-lg-4 theiaStickySidebar">
                            <!-- Booking Summary Card -->
                            <div class="card booking-card">
                                <div class="card-header"><h4 class="card-title">Booking Summary</h4></div>
                                <div class="card-body">
                                    <div class="booking-doc-info">
                                        <a href="#" class="booking-doc-img"><img src="assets/img/doctors/doctor-thumb-02.jpg" alt="Doctor"></a>
                                        <div class="booking-info"><h4><a href="#">Dr. Darren Elder</a></h4><div class="clinic-details"><p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA</p></div></div>
                                    </div>
                                    <div class="booking-summary">
                                        <div class="booking-item-wrap">
                                            <ul class="booking-date">
                                                <li>Date <span id="summary-date-display">Select a date</span></li>
                                                <li>Time <span id="summary-time-display">Select a time</span></li>
                                            </ul>
                                            <ul class="booking-fee">
                                                <li>Consulting Fee <span>$100</span></li>
                                                <li>Booking Fee <span>$10</span></li>
                                            </ul>
                                            <div class="booking-total"><ul class="booking-total-list"><li><span>Total</span><span class="total-cost">$110</span></li></ul></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Booking Summary -->
                        </div>
                    </div>
                </form> <!-- End of the form -->
            </div>
        </div>		
        <!-- /Page Content -->
   
        <!-- Footer (Your template's footer) -->
        <footer class="footer">
           <!-- ... your footer HTML ... -->
        </footer>
        <!-- /Footer -->
       
    </div>
    <!-- /Main Wrapper -->
  
    <!-- Essential JS files -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
    <script src="assets/js/script.js"></script>
    
    <!-- ======================================================= -->
    <!-- START: JAVASCRIPT FOR CALENDAR & PAYMENT LOGIC -->
    <!-- ======================================================= -->
    <script>
    $(document).ready(function () {
        // --- 1. CALENDAR LOGIC ---
        const reservedAppointments = { "2025-07-25": ["09:30 AM", "11:15 AM"] };
        function generateWeekCalendar() {
            const calendar = $('#week-calendar'); calendar.empty(); const today = new Date();
            for (let i = 0; i < 7; i++) {
                const date = new Date(today); date.setDate(today.getDate() + i);
                const day = date.toLocaleDateString('en-US', { weekday: 'short' });
                const fullDate = `${date.getDate()} ${date.toLocaleDateString('en-US', { month: 'short' })}`;
                const dateString = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
                calendar.append(`<li data-date="${dateString}" data-full-date="${fullDate}"><span>${day}</span><span class="slot-date">${fullDate}</span></li>`);
            }
        }
        function generateTimeSlots(dateStr) {
            const timeContainer = $('#time-slot-container'); timeContainer.empty();
            const slots = []; let currentTime = new Date(`2024-01-01T09:00:00`); const endTime = new Date(`2024-01-01T17:00:00`);
            while (currentTime < endTime) {
                slots.push(currentTime.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', hour12: true }));
                currentTime.setMinutes(currentTime.getMinutes() + 15);
            }
            const reservedSlots = reservedAppointments[dateStr] || [];
            slots.forEach(slot => {
                const isReserved = reservedSlots.includes(slot);
                timeContainer.append(`<li><a href="#" class="timing ${isReserved ? 'reserved' : ''}" data-time="${slot}">${slot}</a></li>`);
            });
        }
        $('#week-calendar').on('click', 'li', function() {
            const li = $(this); li.siblings().removeClass('active'); li.addClass('active');
            const dateStr = li.data('date'); const fullDate = li.data('full-date');
            $('#selected-date-display').text(`Available Slots for ${fullDate}`);
            $('#summary-date-display').text(fullDate);
            $('#appointment_date_input').val(dateStr); // Update hidden input
            $('#summary-time-display').text('Select a time');
            $('#appointment_time_input').val(''); // Clear hidden input
            $('#time-slot-container .timing').removeClass('selected');
            generateTimeSlots(dateStr);
        });
        $('#time-slot-container').on('click', '.timing:not(.reserved)', function(e) {
            e.preventDefault();
            const timing = $(this);
            $('#time-slot-container .timing').removeClass('selected');
            timing.addClass('selected');
            const selectedTime = timing.data('time');
            $('#summary-time-display').text(selectedTime);
            $('#appointment_time_input').val(selectedTime); // Update hidden input
        });
        generateWeekCalendar();
        if($('#week-calendar li').length > 0) {
            $('#week-calendar li:first-child').trigger('click');
        }

        // --- 2. PAYMENT METHOD TOGGLE LOGIC ---
        $('input[name="payment_method"]').on('change', function() {
            $('.payment-form-fields').hide();
            const targetForm = $(this).data('target');
            $(targetForm).slideDown();
        });
    });
    </script>
</body>
</html>