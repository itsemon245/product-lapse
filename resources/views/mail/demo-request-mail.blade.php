<x-mail::message>

**Hello,**

A new demo request is received from {{$demoRequest->full_name}} with the following details.
<br>

<ul>
    <li>Official Email: {{$demoRequest->official_email}}</li>
    <li>Phone Number: {{$demoRequest->phone_number}}</li>
    <li>Company Name: {{$demoRequest->company_name}}</li>
</ul>

<x-mail::button :url="route('demo-request.index')">
See Requests
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
