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


</style>
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        Create Remuneration Form
    </div>

    <div class="card-body">
        <div class="container">
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
            </div>
        </div>


        <form method="POST" action="{{ route('admin.remuneration-forms.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6 col-sm-12 form-group">
                        <div class="examiner-details">
                            <label for="examiner">Name, Designation & Full Address of Examiner/Moderator</label>
                            <input class="form-control" type="text" name="examiner" id="examiner" value="{{ old('examiner', Auth::user()->name ?? '') }}" readonly>
                        </div>
                    </div>

                    <!-- Exam Details -->
                    <div class="col-lg-7 col-md-6 col-sm-12 form-group">
                        <div class="exam-details">
                            <!-- Term, Year, Batch on one line -->
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="term">Term</label>
                                    <select class="form-control" name="term" id="term">
                                        <option value="" disabled selected>Select Term</option>
                                        <option value="Mid" {{ old('term') == 'Mid' ? 'selected' : '' }}>Mid</option>
                                        <option value="Final" {{ old('term') == 'Final' ? 'selected' : '' }}>Final</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="year">Year</label>
                                    <input class="form-control" type="text" name="year" placeholder="20SW/21SW" value="{{ old('year', '') }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="batch">Batch</label>
                                    <select class="form-control" name="batch" id="batch">
                                        <option value="" disabled selected>Select Batch</option>
                                        <option value="19" {{ old('batch') == '19' ? 'selected' : '' }}>19</option>
                                        <option value="20" {{ old('batch') == '20' ? 'selected' : '' }}>20</option>
                                        <option value="21" {{ old('batch') == '21' ? 'selected' : '' }}>21</option>
                                        <option value="22" {{ old('batch') == '22' ? 'selected' : '' }}>22</option>
                                        <option value="23" {{ old('batch') == '23' ? 'selected' : '' }}>23</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Exam Type on next line -->
                            <div class="exam-types mt-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="radio" id="regular" name="exam_type" value="regular" {{ old('exam_type') == 'regular' ? 'checked' : '' }}>
                                        <label for="regular">Regular Examinations</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" id="supplementary" name="exam_type" value="supplementary" {{ old('exam_type') == 'supplementary' ? 'checked' : '' }}>
                                        <label for="supplementary">Supplementary Examinations</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Dates for Conduct of Examination -->
                            <div class="conduct-exam mt-3">
                                <label for="exam_date_theory">Date Of Conduct Of Examination (Theory)</label>
                                <input class="form-control date-input" type="text" name="exam_date_theory" id="exam_date_theory" placeholder="Select a date">
                            </div>
                            <div class="conduct-prac mt-3">
                                <label for="exam_date_practical">Date Of Conduct Of Examination (Practical)</label>
                                <input class="form-control date-input" type="text" name="exam_date_practical" id="exam_date_practical" placeholder="Select a date">
                            </div>

                        </div>
                    </div>



                </div>

                <!-- Reference and Date -->
                <div class="row">
                    <div class="col-12 form-group">
                        <div class="ref-and-date">
                            <div class="ref">
                                <label for="ref">Reference: Appointment Letter No. MUET/EXAM/-</label>
                                <input class="form-control" type="text" name="ref" id="ref" value="{{ old('ref', '') }}">
                            </div><br /><br />
                            <div class="this-date">
                                <label for="date">Dated</label>
                                <input class="form-control" type="text" name="date" id="date" readonly>
                                {{-- <input class="form-control"  name="date" id="date" value="{{ old('date', '') }}"> --}}
                            </div><br /><br />
                        </div>
                        <br /><br />
                        <!-- Subject -->
                        <div class="r-d-subject">
                            <label for="subject">Subject</label>
                            <input class="form-control" type="text" name="subject" id="subject" value="{{ old('subject', '') }}">
                        </div>
                    </div>
                </div>

                    <!-- Billing Table -->
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
                                    <td><input class="form-control quantity quantity1" name="quantity1" type="number" id="quantity1" value="{{ old('quantity1', '') }}"></td>
                                    <td><input class="form-control rate rate1" name="rate1" type="number" id="rate1" value="{{ old('rate1', '') }}"></td>
                                    <td><input class="form-control amount amount1" name="amount1" type="number" id="amount1" value="{{ old('amount1', '') }}" readonly></td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Assessment Of Scripts</td>
                                    <td><input class="form-control quantity quantity2" name="quantity2" type="number" id="quantity2" value="{{ old('quantity2', '') }}"></td>
                                    <td><input class="form-control rate rate2" name="rate2" type="number" id="rate2" value="{{ old('rate2', '') }}"></td>
                                    <td><input class="form-control amount amount2" name="amount2" type="number" id="amount2" value="{{ old('amount2', '') }}" readonly></td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Drawing of Objective Type Q.P for PR Exam</td>
                                    <td><input class="form-control quantity" name="quantity3" type="number" id="quantity3" value="{{ old('quantity3', '') }}"></td>
                                    <td><input class="form-control rate" name="rate3" type="number" id="rate3" value="{{ old('rate3', '') }}"></td>
                                    <td><input class="form-control amount" name="amount3" type="number" id="amount3" value="{{ old('amount3', '') }}" readonly></td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Preparation of Exam Sheets</td>
                                    <td><input class="form-control quantity" name="quantity4" type="number" id="quantity4" value="{{ old('quantity4', '') }}"></td>
                                    <td><input class="form-control rate" name="rate4" type="number" id="rate4" value="{{ old('rate4', '') }}"></td>
                                    <td><input class="form-control amount" name="amount4" type="number" id="amount4" value="{{ old('amount4', '') }}" readonly></td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Grading</td>
                                    <td><input class="form-control quantity" name="quantity5" type="number" id="quantity5" value="{{ old('quantity5', '') }}"></td>
                                    <td><input class="form-control rate" name="rate5" type="number" id="rate5" value="{{ old('rate5', '') }}"></td>
                                    <td><input class="form-control amount" name="amount5" type="amount5" id="amount5" value="{{ old('amount5', '') }}" readonly></td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Compilation of Results</td>
                                    <td><input class="form-control quantity" name="quantity6" type="number" id="quantity6" value="{{ old('quantity6', '') }}"></td>
                                    <td><input class="form-control rate" name="rate6" type="number" id="rate6" value="{{ old('rate6', '') }}"></td>
                                    <td><input class="form-control amount" name="amount6" type="number" id="amount6" value="{{ old('amount6', '') }}" readonly></td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Submission of Final Report</td>
                                    <td><input class="form-control quantity" name="quantity7" type="number" id="quantity7" value="{{ old('quantity7', '') }}"></td>
                                    <td><input class="form-control rate" name="rate7" type="number" id="rate7" value="{{ old('rate7', '') }}"></td>
                                    <td><input class="form-control amount" name="amount7" type="number" id="amount7" value="{{ old('amount7', '') }}" readonly></td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td>Administrative Costs</td>
                                    <td><input class="form-control quantity" name="quantity8" type="number" id="quantity8" value="{{ old('quantity8', '') }}"></td>
                                    <td><input class="form-control rate"  name="rate8" type="number" id="rate8" value="{{ old('rate8', '') }}"></td>
                                    <td><input class="form-control amount" name="amount8" type="number" id="amount8" value="{{ old('amount8', '') }}" readonly></td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>Miscellaneous Expenses</td>
                                    <td><input class="form-control quantity" name="quantity9" type="number" id="quantity9" value="{{ old('quantity9', '') }}"></td>
                                    <td><input class="form-control rate" name="rate9" type="number" id="rate9" value="{{ old('rate9', '') }}"></td>
                                    <td><input class="form-control amount" name="amount9" type="number" id="amount9" value="{{ old('amount9', '') }}" readonly></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Rs. (In Words):<input class="form-control" name="in_words" type="text" value="{{ old('in_words', '') }}" placeholder="example thousand and hundred..."></td>
                                    <td colspan="2" style="background-color: #4CAF50; color: white;">Total Amount of Bill</td>
                                    <td><input class="form-control" name="total_amount" type="number" id="total_amount" value="{{ old('total_amount', '') }}" readonly></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2" style="background-color: #4CAF50; color: white;">Deduction (If any)</td>
                                    <td><input class="form-control" name="deduction" type="number" id="deduction" value="{{ old('deduction', '') }}" ></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2" style="background-color: #4CAF50; color: white;">Net Amount Payable</td>
                                    <td><input class="form-control" name="net_amount" type="number" id="net_amount" value="{{ old('net_amount', '') }}" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function calculateAmount() {
            let totalAmount = 0;

            // Calculate each amount
            for (let i = 1; i <= 9; i++) {
                let quantity = parseFloat(document.getElementById(`quantity${i}`).value) || 0;
                let rate = parseFloat(document.getElementById(`rate${i}`).value) || 0;
                let amount = document.getElementById(`amount${i}`);

                if (quantity && rate) {
                    let product = quantity * rate;
                    amount.value = product.toFixed(2);
                    totalAmount += product;
                } else {
                    amount.value = '';
                }
            }

            // Update the total amount field
            document.getElementById('total_amount').value = totalAmount.toFixed(2);

            // Calculate net amount payable
            calculateNetAmount();
        }

        function calculateNetAmount() {
            let totalAmount = parseFloat(document.getElementById('total_amount').value) || 0;
            let deduction = parseFloat(document.getElementById('deduction').value) || 0;
            let netAmount = totalAmount - deduction;
            document.getElementById('net_amount').value = netAmount.toFixed(2);
        }

        // Attach event listeners
        for (let i = 1; i <= 9; i++) {
            document.getElementById(`quantity${i}`).addEventListener('input', calculateAmount);
            document.getElementById(`rate${i}`).addEventListener('input', calculateAmount);
        }

        document.getElementById('deduction').addEventListener('input', calculateNetAmount);
    });
    document.addEventListener('DOMContentLoaded', function() {
        var dateInput = document.getElementById('date');

        if (dateInput) {
            var today = new Date();
            var options = { year: 'numeric', month: 'short', day: 'numeric' };
            var formattedDate = today.toLocaleDateString('en-US', options);

            // Set the formatted date as the value of the text input
            dateInput.value = formattedDate;
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        function formatDate(dateString) {
            const options = { year: 'numeric', month: 'short', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('en-US', options);
        }

        function parseDate(dateString) {
            // Helper function to convert formatted date back to YYYY-MM-DD for input
            const [month, day, year] = dateString.split(' ');
            const months = { Jan: 1, Feb: 2, Mar: 3, Apr: 4, May: 5, Jun: 6, Jul: 7, Aug: 8, Sep: 9, Oct: 10, Nov: 11, Dec: 12 };
            return `${year}-${months[month]}-${day.replace(',', '').padStart(2, '0')}`;
        }

        function handleDateInput(inputElement) {
            const date = new Date();
            inputElement.addEventListener('focus', function() {
                this.type = 'date';
                this.value = this.value ? parseDate(this.value) : '';
            });

            inputElement.addEventListener('blur', function() {
                this.type = 'text';
                this.value = this.value ? formatDate(this.value) : '';
            });
        }

        const theoryInput = document.getElementById('exam_date_theory');
        const practicalInput = document.getElementById('exam_date_practical');

        handleDateInput(theoryInput);
        handleDateInput(practicalInput);
    });


</script>
@endsection
