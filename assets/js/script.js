$(document).ready(function () {
	$(".numberInput").on("input", function () {
		var value = $(this).val();

		// Remove any non-numeric characters
		value = value.replace(/[^0-9]/g, "");

		// Convert the value to an integer
		value = parseInt(value);

		// Check if the value is greater than 100
		if (value > 100) {
			value = 100;
		}

		// Set the value back to the input field
		$(this).val(isNaN(value) ? "" : value);
	});

	// GET STUDENT DATA IN EDIT MODAL
	$(".table-section").on("click", ".editStudentButton", function () {
		var studentId = $(this).data("id");

		$.ajax({
			url: base_url + "home/getStudent", // Replace with your controller method URL
			type: "POST",
			data: { id: studentId },
			success: function (response) {
				var response = JSON.parse(response);

				$("#editID").val(response.id);
				$("#editStudentName").val(response.name);
				$("#editSubject").val(response.subject);
				$("#editMarks").val(response.marks);
			},
			error: function (xhr, status, error) {
				// Handle any errors
				console.error("Error:", error);
			},
		});
	});

	$(".table-section").on("click", ".deleteStudentButton", function () {
		var studentId = $(this).data("id");
		$("#deleteStudentID").val(studentId);
	});

	// LOGIN PAGE SCRIPT START HERE

	$(".showPassword").click(function () {
		$(".userPassword").attr("type", "text");
		$(this).hide();
		$(".hidePassword").show();
	});

	$(".hidePassword").click(function () {
		$(".userPassword").attr("type", "password");
		$(this).hide();
		$(".showPassword").show();
	});

	// ALERT SCRIPT START HERE
	setInterval(() => {
		$(".alert").hide();
	}, 3000);
});
