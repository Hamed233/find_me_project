
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('select[name="grade_id"]').on('change', function () {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('get_classrooms') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="classroom_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="classroom_id"]').append('<option selected disabled >{{trans('Parent_trans.Choose')}}...</option>');
                            $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });

</script>

<script>
$(document).ready(function () {
    $('select[name="classroom_id"]').on('change', function () {
        var classroom_id = $(this).val();
        if (classroom_id) {
            $.ajax({
                url: "{{ URL::to('get_sections') }}/" + classroom_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="section_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });

                },
            });
        }

        else {
            console.log('AJAX load did not work');
        }
    });
});
</script>

