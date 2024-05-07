  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('/') }}/assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('/') }}/assets/demo/chart-area-demo.js"></script>
    <script src="{{ url('/') }}/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('/') }}/assets/js/datatables-simple-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/js/select2.min.js"></script>
    <script type="text/javascript" src="{{url('/') }}/assets/js/jquery.confirm.js"></script>
	  <script src="{{ url('/') }}/assets/js/runtime.js"defer></script>
    

  </body>
  <script>
    $(document).ready(function() {
        $('#team_members_select').select2();
    });
</script>

<script>
  $(document).ready(function(){
      // Add task button functionality
      $("#addTask").click(function(){
          var html = '<div class="form-row mb-2 task-row">' +
                         '<div class="col">' +
                             '<input type="text" class="form-control task" name="tasks[]" placeholder="Task" required>' +
                         '</div>' +
                         '<div class="col">' +
                             '<input type="number" class="form-control hours" name="hours[]" min="0" placeholder="Hours Spent" required>' +
                         '</div>' +
                         '<div class="col-auto">' +
                             '<button type="button" class="btn btn-danger remove-task">&times;</button>' +
                         '</div>' +
                     '</div>';
          $("#taskFields").append(html);
      });

      // Remove task button functionality
      $(document).on("click", ".remove-task", function(){
          $(this).closest(".task-row").remove();
      });
  });
</script>
</script>
</html>