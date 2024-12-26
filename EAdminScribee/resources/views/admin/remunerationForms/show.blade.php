@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('new_assets/css/vendors_css.css') }}">
<link rel="stylesheet" href="{{ asset('new_assets/css/horizontal-menu.css') }}">
<link rel="stylesheet" href="{{ asset('new_assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('new_assets/css/skin_color.css') }}">
<link href="//fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet">
<link href="//fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
<style>
.horizontal-form {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .horizontal-form div {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .form-control {
        margin-right: 5px;
    }
    .reg-sup {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .reg-sup div {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .conduct-exam, .conduct-prac {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .conduct-exam label, .conduct-prac label {
        width: 250px; /* Adjust the width as needed */
        white-space: nowrap;
        margin-right: 10px;
    }
    .examiner-details {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .examiner-details label {
        margin-bottom: 5px;
    }

    .examiner-details input {
        height: 100px; /* Adjust height as needed */
        resize: vertical; /* Allows vertical resizing by the user */
    }

    .ref {
        display: flex;
        justify-content: center; /* Center horizontally */
    }
    .ref-and-date {
        display: flex;
        gap: 20px; /* Space between columns */
        align-items: center;
    }

    .ref, .this-date {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .ref label, .this-date label {
        margin-right: 10px;
        white-space: nowrap;
    }

    .ref input, .this-date input {
        width: 250px; /* Adjust as needed for smaller input size */
    }

    .r-d-subject {
        display: flex;
        align-items: center;
        gap: 10px; /* Space between label and input */
    }

    .r-d-subject label {
        margin-right: 10px; /* Space between label and input */
    }

    .r-d-subject input {
        flex: 1; /* Allows the input to grow and fill the available space */
    }

    .practical-exam-details {
        display: flex;
        flex-direction: column;
        gap: 10px; /* Space between elements */
        font-size: 15px;
    }

    .date-wrapper {
        display: inline-block;
        text-align: center; /* Center the text around the date input */
        width: 150px; /* Adjust width to fit the layout */
        margin: 0 10px; /* Space around the date input */
    }

    .date-wrapper input {
        width: 80%; /* Full width of the wrapper */
        box-sizing: border-box; /* Include padding and border in the width */
    }

    .dates {
        display: flex;
        flex-direction: column;
        gap: 20px; /* Space between each section */
    }

    .dates > div {
        display: flex;
        justify-content: space-between; /* Space between label and input */
        align-items: center;
    }

    .dates label {
        flex: 0 0 auto; /* Prevent label from growing */
        margin-right: 0px; /* Space between label and input */
        white-space: nowrap; /* Prevent label from wrapping to the next line */
    }

    .dates input[type="date"] {
        flex: 1; /* Allow input to grow and fill the available space */
        max-width: 200px; /* Adjust as needed */
    }


    .form-container {
        display: flex;
        flex-direction: column;
        gap: 10px; /* Space between rows */
    }

    .form-row {
        display: flex;
        gap: 20px; /* Space between label-input pairs */
        align-items: center;
    }

    .form-row div {
        display: flex;
        align-items: center;
        gap: 5px; /* Space between label and input */
    }

    .form-row label {
        margin-right: 5px; /* Space between label and input */
    }

    .form-row input {
        flex: 1; /* Allow input to grow and fill available space */
        max-width: 150px; /* Adjust as needed */
    }
    .muet-logo img {
    max-width: 100%;
    height: auto; /* Ensure the image scales correctly */
}

.bill-header {
    text-align: center; /* Center-align text within the bill header */
}

.university-name {
    font-size: 1.25rem; /* Adjust the font size as needed */
    font-weight: bold; /* Make the font bold */
    margin-bottom: 10px; /* Space below the heading */
    text-decoration: underline;
}

.renum {
    font-size: 1.15rem; /* Adjust the font size as needed */
    font-weight: bold; /* Make the font bold */
    margin-bottom: 15px; /* Space below the heading */
}

p {
    margin-top: 0; /* Remove top margin to tighten spacing */
    margin-bottom: 20px; /* Space below the paragraph */
}

/* Flexbox utilities to center content */
.d-flex {
    display: flex;
}

.align-items-center {
    align-items: center; /* Center content vertically */
}

.text-center {
    text-align: center; /* Center-align text */
}

.img-fluid {
    max-width: 100%;
    height: auto; /* Ensure the image scales correctly */
}
.renum-container {
    background-color: #4CAF50; /* Sky blue color */
    color: white;
    border-radius: 25px; /* Rounded corners */
    padding: 10px; /* Space inside the container */
    display: inline-block; /* Ensure container fits content */
    text-align: center; /* Center the text inside the container */
}

.renum {
    font-size: 1.15rem; /* Adjust the font size as needed */
    font-weight: bold; /* Make the font bold */
    margin: 0; /* Remove default margin */
}
/* Ensure correct spacing between rows */
.mt-3 {
    margin-top: 1rem; /* Adjust as needed for spacing */
}

/* Optional: Align labels and inputs properly */
.form-control {
    width: 100%; /* Ensure inputs take full width of their containers */
}

.form-group {
    margin-bottom: 1.5rem; /* Space between form groups */
}
/* Adjust the width of the date input fields */
/* Container for date inputs to align them to the right */
.conduct-exam, .conduct-prac {
    text-align: right; /* Aligns the text and the input fields to the right */
}

.form-control.date-input {
    display: inline-block; /* Ensure the input field fits its content */
    text-align: right; /* Aligns text inside the input field to the right */
    width: auto; /* Adjust width as needed */
    max-width: 100%; /* Ensure it does not exceed the container width */
    margin: 0; /* Remove any extra margin */
    padding: 0.75rem 0.75rem; /* Optional: Adjust padding to suit your design */
}
/* Container for aligning date inputs to the right */
.conduct-exam, .conduct-prac {
    text-align: right; /* Aligns text and input fields to the right */
    margin-bottom: 1rem; /* Add spacing between sections */
}

.conduct-exam label, .conduct-prac label {
    display: block; /* Ensure labels take full width */
    text-align: right; /* Align labels text to the right */
}

.form-control.date-input {
    display: inline-block; /* Ensure the input field fits its content */
    text-align: right; /* Align text inside the input field to the right */
    width: auto; /* Adjust width as needed */
    max-width: 100%; /* Ensure it does not exceed container width */
    margin-left: 200px; /* Remove extra margin */
    padding: 0.375rem 0.75rem; /* Adjust padding as needed */
    max-width: 500px;
}

.muet-logo img {
    max-width: 100%;
    height: auto; /* Ensure the image scales correctly */
}

.bill-header {
    text-align: center; /* Center-align text within the bill header */
}

.university-name {
    font-size: 1.25rem; /* Adjust the font size as needed */
    font-weight: bold; /* Make the font bold */
    margin-bottom: 10px; /* Space below the heading */
    text-decoration: underline;
}

.renum {
    font-size: 1.15rem; /* Adjust the font size as needed */
    font-weight: bold; /* Make the font bold */
    margin-bottom: 15px; /* Space below the heading */
}

p {
    margin-top: 0; /* Remove top margin to tighten spacing */
    margin-bottom: 20px; /* Space below the paragraph */
}

/* Flexbox utilities to center content */
.d-flex {
    display: flex;
}

.align-items-center {
    align-items: center; /* Center content vertically */
}

.text-center {
    text-align: center; /* Center-align text */
}

.img-fluid {
    max-width: 100%;
    height: auto; /* Ensure the image scales correctly */
}

.renum-container {
    background-color: #4CAF50; /* Sky blue color */
    color: white;
    border-radius: 25px; /* Rounded corners */
    padding: 10px; /* Space inside the container */
    display: inline-block; /* Ensure container fits content */
    text-align: center; /* Center the text inside the container */
}

.renum {
    font-size: 1.15rem; /* Adjust the font size as needed */
    font-weight: bold; /* Make the font bold */
    margin: 0; /* Remove default margin */
}

/* Ensure correct spacing between rows */
.mt-3 {
    margin-top: 1rem; /* Adjust as needed for spacing */
}

/* Optional: Align labels and inputs properly */
.form-control {
    width: 100%; /* Ensure inputs take full width of their containers */
}

.form-group {
    margin-bottom: 1.5rem; /* Space between form groups */
}

/* Adjust the width and alignment of the date input fields */
.conduct-exam, .conduct-prac {
    text-align: right; /* Aligns text and input fields to the right */
    margin-bottom: 1rem; /* Add spacing between sections */
}

.conduct-exam label, .conduct-prac label {
    display: block; /* Ensure labels take full width */
    text-align: right; /* Align labels text to the right */
}

.form-control {
    display: block; /* Ensure the input field takes full width */
    text-align: left; /* Align text inside the input field to the right */
    width: 100%; /* Adjust width as needed */
    max-width: 500px; /* Limit the maximum width */
    margin-left: 0; /* Remove extra margin */
    padding: 0.375rem 0.75rem; /* Adjust padding as needed */
}

.form-control[readonly] {
    background-color: #f5f5f5; /* Light gray background for readonly fields */
    cursor: not-allowed; /* Indicate that the field is not editable */
}

.exam-t-y-b {
    display: flex; /* Use Flexbox to align items in a row */
    flex-wrap: wrap; /* Allow items to wrap to the next line if necessary */
    gap: 1rem; /* Space between the items */
}

.exam-t-y-b-item {
    flex: 1; /* Allow each item to grow equally */
    min-width: 200px; /* Ensure a minimum width for better readability */
}

.exam-t-y-b label {
    display: block; /* Make sure labels take full width */
    margin-bottom: 0.5rem; /* Space below labels */
}

.form-control {
    width: 100%; /* Ensure inputs take full width of their containers */
}


</style>
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.remunerationForm.title') }}
    </div>

    <div class="card-body">

        <div class="form-group">
            {{-- <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.remuneration-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div> --}}
            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-2 col-sm-12 d-flex ">
                    <div class="muet-logo">
                        <img src="{{ asset('new_assets') }}/images/muet_logo.png" alt="muet-logo" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 text-center">
                    <div class="bill-header">
                        <h5 class="university-name">MEHRAN UNIVERSITY OF ENGINEERING & TECHNOLOGY, JAMSHORO</h5>

                        <div class="renum-container">
                            <h5 class="renum">Remuneration Bill for Internal Examiner</h5>
                        </div>

                        <p>Examiner is requested to submit his/her bill along with Answer books (TH/PR). Bill will not be entertained without Revenue Stamp</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12">
                <div class="muet-logo ">
                    <img src="{{ asset('new_assets') }}/images/muet_logo.png" alt="muet-logo">
                </div>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6 col-sm-12 form-group">
                        <div class="examiner-details">
                            <label for="examiner">Name, Designation & Full Address of Examiner/Moderator</label>
                            <input class="form-control" type="text" name="examiner" id="examiner" value="{{ old('examiner', $remunerationForm->examiner) }}" readonly>
                        </div>
                    </div>

                    <!-- Exam Details -->
                    <div class="col-lg-7 col-md-6 col-sm-12 form-group">
                        <div class="exam-details">
                            <div class="exam-t-y-b">
                                <div class="exam-t-y-b-item">
                                    <label for="term">Term</label>
                                    <input class="form-control" type="text" value="{{ $remunerationForm->term }}" readonly>
                                </div>
                                <div class="exam-t-y-b-item">
                                    <label for="year">Year</label>
                                    <input class="form-control" type="text" name="year" value="{{ $remunerationForm->year }}" readonly>
                                </div>
                                <div class="exam-t-y-b-item">
                                    <label for="batch">Batch</label>
                                    <input class="form-control" type="text" name="batch" value="{{ $remunerationForm->batch }}" readonly>
                                </div>
                            </div>

                            <!-- Exam Type -->
                            <div class="reg-sup mt-3">
                                <div class="reg-exam">
                                    <input type="radio" id="regular" name="exam_type" value="regular" {{ old('exam_type', $remunerationForm->exam_type) == 'regular' ? 'checked' : '' }} disabled>
                                    <label for="regular">Regular Examinations</label><br /><br />
                                </div>
                                <div class="sup-exam">
                                    <input type="radio" id="supplementary" name="exam_type" value="supplementary" {{ old('exam_type', $remunerationForm->exam_type) == 'supplementary' ? 'checked' : '' }} disabled>
                                    <label for="supplementary">Supplementary Examinations</label><br /><br />
                                </div>
                            </div>
                            <div class="conduct-exam mt-3">
                                <label for="exam_date_theory">Date Of Conduct Of Examination (Theory)</label>
                                <input class="form-control date-input"  id="exam_date_theory" value="{{ $remunerationForm->exam_date_theory }}" readonly>
                            </div>
                            <div class="conduct-prac mt-3">
                                <label for="exam_date_practical">Date Of Conduct Of Examination (Practical)</label>
                                <input class="form-control date-input"  id="exam_date_practical" value="{{ $remunerationForm->exam_date_practical }}" readonly>
                            </div>

                            <!-- Dates for Conduct of Examination -->
                            {{-- <div class="conduct-exam mt-3">
                                <label for="exam_date_theory">Date Of Conduct Of Examination (Theory)</label>
                                <input class="form-control" id="exam_date_theory" value="{{ $remunerationForm->exam_date_theory }}" readonly><br /><br />
                            </div>
                            <div class="conduct-prac mt-3">
                                <label for="exam_date_practical">Date Of Conduct Of Examination (Practical)</label>
                                <input class="form-control" id="exam_date_practical" value="{{ $remunerationForm->exam_date_practical }}" readonly><br /><br />
                            </div> --}}
                        </div>

                    </div>
                </div>

                <!-- Reference and Date -->
                <div class="row">
                    <div class="col-12 form-group">
                        <div class="ref-and-date">
                            <div class="ref">
                                <label for="ref">Reference: Appointment Letter No. MUET/EXAM/-</label>
                                <input class="form-control" type="text" name="ref" id="ref" value="{{ old('ref', $remunerationForm->ref) }}" readonly>
                            </div><br /><br />

                            <div class="this-date">
                                <label for="date">Dated</label>
                                <input class="form-control" type="text" name="date" id="date" value="{{ old('date', $remunerationForm->date) }}" readonly>
                            </div><br /><br />
                        </div>

                        <!-- Subject -->
                        <div class="r-d-subject">
                            <label for="subject">Subject</label>
                            <input class="form-control" type="text" name="subject" id="subject" value="{{ old('subject', $remunerationForm->subject) }}" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <table class="table" >
                    <thead  style="background-color: #4CAF50; color: white;">
                        <tr>
                            <th>S.NO</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Rate (In Rs.)</th>
                            <th>Amount (In Rs.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Drawing up Question Paper</td>
                            <td>{{ $remunerationForm->quantity1 }}</td>
                            <td>{{ $remunerationForm->rate1 }}</td>
                            <td>{{ $remunerationForm->amount1 }}</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Assessment Of Scripts</td>
                            <td>{{ $remunerationForm->quantity2 }}</td>
                            <td>{{ $remunerationForm->rate2 }}</td>
                            <td>{{ $remunerationForm->amount2 }}</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Drawing of Objective Type Q.P for PR Exam</td>
                            <td>{{ $remunerationForm->quantity3 }}</td>
                            <td>{{ $remunerationForm->rate3 }}</td>
                            <td>{{ $remunerationForm->amount3 }}</td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Preparation of Exam Sheets</td>
                            <td>{{ $remunerationForm->quantity4 }}</td>
                            <td>{{ $remunerationForm->rate4 }}</td>
                            <td>{{ $remunerationForm->amount4 }}</td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td>Grading</td>
                            <td>{{ $remunerationForm->quantity5 }}</td>
                            <td>{{ $remunerationForm->rate5 }}</td>
                            <td>{{ $remunerationForm->amount5 }}</td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td>Compilation of Results</td>
                            <td>{{ $remunerationForm->quantity6 }}</td>
                            <td>{{ $remunerationForm->rate6 }}</td>
                            <td>{{ $remunerationForm->amount6 }}</td>
                        </tr>
                        <tr>
                            <td>7.</td>
                            <td>Submission of Final Report</td>
                            <td>{{ $remunerationForm->quantity7 }}</td>
                            <td>{{ $remunerationForm->rate7 }}</td>
                            <td>{{ $remunerationForm->amount7 }}</td>
                        </tr>
                        <tr>
                            <td>8.</td>
                            <td>Administrative Costs</td>
                            <td>{{ $remunerationForm->quantity8 }}</td>
                            <td>{{ $remunerationForm->rate8 }}</td>
                            <td>{{ $remunerationForm->amount8 }}</td>
                        </tr>
                        <tr>
                            <td>9.</td>
                            <td>Miscellaneous Expenses</td>
                            <td>{{ $remunerationForm->quantity9 }}</td>
                            <td>{{ $remunerationForm->rate9 }}</td>
                            <td>{{ $remunerationForm->amount9 }}</td>
                        </tr>
                        <tr class="table-headings">
                            <td id="td-rs" colspan="2">
                                <label for="">Rs. (In Words):</label>
                                <input class="form-control" type="text" value="{{ $remunerationForm->in_words }}" readonly>
                            </td>
                            <th colspan="2" class="text-center" style="background-color: #4CAF50; color: white;">Total Amount of Bill</th>
                            <td><input class="form-control" type="number" id="total_amount" value="{{ $remunerationForm->total_amount }}" readonly ></td>
                        </tr>
                        <tr class="table-headings">
                            <td colspan="2"></td>
                            <th colspan="2" class="text-center" style="background-color: #4CAF50; color: white;">Deduction (If any)</th>
                            <td><input class="form-control" type="number" id="deduction" value="{{ $remunerationForm->deduction }}" readonly></td>
                        </tr>
                        <tr class="table-headings">
                            <td colspan="2"></td>
                            <th colspan="2" class="text-center" style="background-color: #4CAF50; color: white;">Net Amount Payable</th>
                            <td><input class="form-control" type="number" id="net_amount" value="{{ $remunerationForm->net_amount }}" readonly></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            </div>
                    {{-- <div class="form-group">
                        <table class="table">
                            <thead>
                                <tr class="text-center table-headings">
                                    <th scope="col">S.NO </th>
                                    <th scope="col">Description(Claim of the Bill)</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Rate (In Rs.)</th>
                                    <th scope="col">Amount (In Rs.)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1.</th>
                                    <td>Drawing up Question Paper</td>
                                    <td>{{ $remunerationForm->quantity1 }}</td>
                                    <td>{{ $remunerationForm->rate1 }}</td>
                                  <td>{{ $remunerationForm->amount1 }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">2.</th>
                                    <td>Assessment Of Scripts</td>
                                    <td>{{ $remunerationForm->quantity2 }}</td>
                                    <td>{{ $remunerationForm->rate2 }}</td>
                                  <td>{{ $remunerationForm->amount2 }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">3.</th>
                                    <td>Drawing of Objective Type Q.P for PR Exam</td>
                                    <td>{{ $remunerationForm->quantity3 }}</td>
                                    <td>{{ $remunerationForm->rate3 }}</td>
                                  <td>{{ $remunerationForm->amount3 }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">4.</th>
                                    <td>Conduct Of Practical Examination</td>
                                    <td>{{ $remunerationForm->quantity4 }}</td>
                                    <td>{{ $remunerationForm->rate4 }}</td>
                                  <td>{{ $remunerationForm->amount4 }}</td>
                                  <tr>
                                    <th scope="row">5.</th>
                                    <td>Drawing of Practical type Q.P for PR Exam</td>
                                    <td>{{ $remunerationForm->quantity5 }}</td>
                                    <td>{{ $remunerationForm->rate5 }}</td>
                                  <td>{{ $remunerationForm->amount5 }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">6.</th>
                                    <td>Miscellaneous</td>
                                    <td>{{ $remunerationForm->quantity6 }}</td>
                                    <td>{{ $remunerationForm->rate6}}</td>
                                    <td>{{ $remunerationForm->amount6}}</td>
                                  </tr>
                                <tr>
                                  <th scope="row" >7.</th>
                                  <td>Conduct of Viva Voce Thesis</td>
                                  <td>{{ $remunerationForm->quantity7 }}</td>
                                  <td>{{ $remunerationForm->rate7 }}</td>
                                  <td>{{ $remunerationForm->amount7 }}</td>
                                </tr>
                                <tr>
                                  <th scope="row" >8.</th>
                                  <td>Invigilation (TH/PR) Tabulation/Checking/Typing of Q.P</td>
                                  <td>{{ $remunerationForm->quantity8 }}</td>
                                  <td>{{ $remunerationForm->rate8 }}</td>
                                  <td>{{ $remunerationForm->amount8 }}</td>
                                </tr>
                                <tr>
                                  <th scope="row" >9.</th>
                                  <td>Others(to be specified)</td>
                                  <td>{{ $remunerationForm->quantity9 }}</td>
                                  <td>{{ $remunerationForm->rate9 }}</td>
                                  <td>{{ $remunerationForm->amount9 }}</td>

                                </tr>
                                <tr class="table-headings">
                                    <td id="td-rs" colspan="2">
                                        <label for="">Rs. (In Words):</label>
                                        <input class="form-control" type="text" value="{{ $remunerationForm->in_words }}" readonly>
                                    </td>
                                    <th colspan="2" class="text-center">Total Amount of Bill</th>
                                    <td><input class="form-control" type="number" id="total_amount" value="{{ $remunerationForm->total_amount }}" readonly ></td>
                                </tr>
                                <tr class="table-headings">
                                    <td colspan="2"></td>
                                    <th colspan="2" class="text-center">Deduction (If any)</th>
                                    <td><input class="form-control" type="number" id="deduction" value="{{ $remunerationForm->deduction }}" readonly></td>
                                </tr>
                                <tr class="table-headings">
                                    <td colspan="2"></td>
                                    <th colspan="2" class="text-center">Net Amount Payable</th>
                                    <td><input class="form-control" type="number" id="net_amount" value="{{ $remunerationForm->net_amount }}" readonly></td>
                                </tr>

                                <!-- Add more rows as needed -->

                            </tbody>
                        </table>
                    </div> --}}



            @if(($user->is_admin && count($logs))|| ($user->is_user && count($logs)))
                <h3>Logs</h3>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Changes</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td>
                                    {{ $log['user'] }}
                                </td>
                                <td>
                                    <ul>
                                        @foreach($log['changes'] as $change)
                                            <li>
                                                {!! $change !!}
                                            </li>
                                        @endforeach
                                        @if($log['comment'])
                                            <li>
                                                <b>Comment</b>: {{ $log['comment'] }}
                                            </li>
                                        @endif
                                    </ul>
                                </td>
                                <td>
                                    {{ $log['time'] }}
                                </td>
                                <td>
                                    @if($log['signature'])
                                        <img src="{{ asset($log['signature']) }}"  alt="Signature" style="max-width: 100px; height: auto;">
                                    @else
                                        No signature available
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            @endif
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.remunerationForm.fields.id') }}
                        </th>
                        <td>
                            {{ $remunerationForm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.remunerationForm.fields.total_amount') }}
                        </th>
                        <td>
                            {{ $remunerationForm->total_amount }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.remunerationForm.fields.status') }}
                        </th>
                        <td>
                            {{$remunerationForm->status->name }}
                        </td>
                    </tr>
                    @if($user->is_admin || $user->is_user)
                        <tr>
                            <th>
                                {{ trans('cruds.remunerationForm.fields.chairman') }}
                            </th>
                            <td>
                                {{ $remunerationForm->chairman->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.remunerationForm.fields.dean') }}
                            </th>
                            <td>
                                {{ $remunerationForm->dean->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.remunerationForm.fields.exam_controller') }}
                            </th>
                            <td>
                                {{ $remunerationForm->exam_controller->name ?? '' }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="form-group">
                @if($user->is_user && in_array($remunerationForm->status_id, [1,11, 3, 4]))
                    <a class="btn btn-success" href="{{ route('admin.remuneration-forms.showSend', $remunerationForm->id) }}">
                        Send to
                        @if($remunerationForm->status_id == 1)
                            chairman
                        @elseif($remunerationForm->status_id == 11)
                            Dean
                        @else
                            Exam Controller
                        @endif
                    </a>
                @elseif(($user->is_chairman && $remunerationForm->status_id == 10) ||($user->is_dean && $remunerationForm->status_id == 2) || ($user->is_exam_controller && $remunerationForm->status_id == 5))
                    <a class="btn btn-success" href="{{ route('admin.remuneration-forms.showAnalyze', $remunerationForm->id) }}">
                        Submit analysis
                    </a>
                @endif

                @if(Gate::allows('remuneration_form_edit') && in_array($remunerationForm->status_id, [6,7]))
                    <a class="btn btn-info" href="{{ route('admin.remuneration-forms.edit', $remunerationForm->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endif

                @can('remuneration_form_delete')
                    <form action="{{ route('admin.remuneration-forms.destroy', $remunerationForm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="{{ trans('global.delete') }}">
                    </form>
                @endcan
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.remuneration-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
