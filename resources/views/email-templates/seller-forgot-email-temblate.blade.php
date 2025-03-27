Dear <b>{{ $seller->name }} </b><br>
<p>
    you are recivieng this email because you request to reset password {{ $settings->site_name }}</p>
    <p>
        please click on this link to reset password 
        <a href="{{ $actionLink }}" target="_blank">{{ $actionLink }}</a> <br>
        <p>this link is only valid for 15 minutes </p>
    </p>