<!-- start delete Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="deleteModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white bg-danger">
                <h5 class="modal-title" id="deleteSubTaskLabel">
                    <i class="fa-solid fa-trash-can"></i>
                    Destroy Report
                </h5>
            </div>

            <form action="{{ route('report.destroy', 'test') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="report_id" id="report_id">
                    &#x2022; Are you sure you want to delete this Report ? <br>

                    <br>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-danger text-white">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end delete Modal -->

<!-- start trigger Img Modal -->
<div class="modal fade" id="ImgModal" tabindex="-1" aria-labelledby="deleteModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center">
                <img id="trigger_Img" class=" img-fluid" src="" alt="" srcset="">

            </div>
        </div>
    </div>
</div>
<!-- end trigger Img Modal -->

@section('script')
    <script>
        $('#DeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var report_id = button.data('report_id')
           
            var modal = $(this)
            modal.find('.modal-body #report_id').val(report_id);
        });
    </script>

    <script>
        $('#ImgModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var img = button.data('img');
            console.log(img);
            var modal = $(this)
            modal.find('.modal-body #trigger_Img').attr("src", img);
        });
    </script>
@endsection
