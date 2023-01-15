<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border-radius:100%; border-width:thin;">
                    <span aria-hidden="true" style="font-weight:bold ;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <th>JUDUL</th>
                        <td><span id="judul"></span></td>
                    </tr>
                    <tr>
                        <th>ID buku</th>
                        <td><span id="idbuku"></span></td>
                    </tr>
                    <tr>
                        <th>Sinopsis</th>
                        <td><span id="sinopsis"></span></td>
                    </tr>
                    <tr>
                        <th>available:</th>
                        <td><span id="qty"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{ route('pinjam', $buku->id) }}" style="display:inline-block;" method="POST">
                    @csrf
                    <button class="btn btn-danger">pinjam</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var bookTitle = document.querySelectorAll('#details')
    bookTitle.forEach(function(details) {

        details.addEventListener("click", function() {
            var titleId = this.getAttribute('detail-id')
            var y = document.getElementById('detail-' + titleId);
            if (y.style.display == 'none') {
                document.getElementById('detail-' + titleId).style.display = 'block';
            } else {
                document.getElementById('detail-' + titleId).style.display = 'none';
            }
            // $('#detail-{{ $buku->book_id }}').click();
        })
    })
    // $("#details").click(function(e) {
    //     $("#detail").click();
    // });
    $(document).ready(function() {
        $(document).on('click', '#detail', function() {
            var judul = $(this).data('judul');
            var idbuku = $(this).data('idbuku');
            var sinopsis = $(this).data('sinopsis');
            var qty = $(this).data('qty');
            $('#judul').text(judul);
            $('#idbuku').text(idbuku);
            $('#sinopsis').text(sinopsis);
            $('#qty').text(qty);
            // alert('judul');
        })
    })
</script>
