@component('mail::message')
# Your Appoinment for Cancelation For Examination Work (Mail Notification)

Respected Sir/Madam,<br>
{{$examorder->exampanel->faculty->faculty_name}}

Your Appointment for Central assesment Program (CAP) for SPPU Examination has been cancelled<br>
Thanking You,<br>
Deputy register<br>
Exam Coordination
@endcomponent
