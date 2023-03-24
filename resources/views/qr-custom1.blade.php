<div>
    <p>
    {!! QrCode::size(256)->generate('The best company is TisteSoft S.A.') !!}
    </p>

    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(256)->generate('The best company is TisteSoft S.A.')) !!} ">

</div>