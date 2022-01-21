@component('mail::message')
    #Activate your account
    @component('mail::panel')
        To activate your account
    @endcomponent
    @component('mail::button', ['url' => $url])
        click in here
    @endcomponent
    Thank you
    <br>
    Team {{ config('app.name') }}  
    
@endcomponent