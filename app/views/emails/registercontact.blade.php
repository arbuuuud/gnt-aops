<p>Kepada {{$contact->first_name}},</p>

<p>Terima kasih,</p>
<p>Anda telah mengikuti newsletter mengenai informasi informasi GNT</p>
<p><a href="{{url('/unsubscribe/'.$contact->encryptContact())}}">Unsubsribe</a> apabila anda tidak lagi mau menerima email newsletter dari kami</p>
<p>Terima kasih</p>
<br/>
<p>Hormat kami,</p>
<p>{{$contact->user->first_name}},</p>

