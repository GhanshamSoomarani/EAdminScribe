$(document).ready(function () {
    // Function to calculate the amount and total bill
    function calculateAmount() {
        let totalAmount = 0;

        // Loop through each row
        $('tbody tr').each(function () {
            let quantity = $(this).find('.quantity').val();
            let rate = $(this).find('.rate').val();
            let amount = $(this).find('.amount');

            // Calculate the amount if both quantity and rate are provided
            if (quantity && rate) {
                let product = quantity * rate;
                amount.val(product.toFixed(2));
                totalAmount += product;
            } else {
                amount.val('');
            }
        });

        // Update the total amount field
        $('#total_amount').val(totalAmount.toFixed(2));

        // Calculate net amount payable
        calculateNetAmount();
    }

    // Function to calculate net amount payable
    function calculateNetAmount() {
        let totalAmount = parseFloat($('#total_amount').val()) || 0;
        let deduction = parseFloat($('#deduction').val()) || 0;
        let netAmount = totalAmount - deduction;

        // Update the net amount field
        $('#net_amount').val(netAmount.toFixed(2));
    }

    // Event listeners for input fields
    $(document).on('input', '.quantity, .rate', function () {
        calculateAmount();
    });

    // Event listener for deduction field
    $(document).on('input', '#deduction', function () {
        calculateNetAmount();
    });
});
