<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Submission Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #1a202c;">

    <h2>Dear Mr./Mrs. {{ $admission->parent_last_name }},</h2>

    <p>We sincerely appreciate your submission of your child's application to FUMCES.</p>

    <p><strong>Application ID:</strong> {{ $admission->application_id }}</p>

    <p>Your application will be carefully reviewed, and you will be notified once the evaluation process is complete.</p>

    <p>To proceed, please upload the required documents by clicking the button below:</p>

    <p>
        <a href="{{ route('student.admissions.documents') }}" style="
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            color: #ffffff;
            background-color: #2f855a;
            text-decoration: none;
            border-radius: 6px;
        ">Upload Documents</a>
    </p>

    <p>Thank you for your trust and interest in FUMCES.</p>

    <p>Yours faithfully,<br>
    FUMCES Admissions Team</p>

</body>
</html>
Route [student.admissions.documents] not defined.