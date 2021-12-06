{!! Form::open(['route' => ['multiple.store'], 'method' => 'post', 'role'=> 'form', 'class' => 'form']) !!}

<ul id="link-list">
    <!-- append new rows -->
</ul>

<div id="newlink" class="form-inline">
    <div class="form-group">
        {!! Form::text('prestore', null, ['placeholder' => 'Store name', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('prelink', null, ['placeholder' => 'Link / URL', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <button class="btn btn-primary submit new-row" type="button">Add store link</button>
    </div>
</div>

<br /><br />

{!! Form::submit('Submit rows', ['class' => 'btn btn-success submit']) !!}

{!! Form::close() !!}

<script>
    $(document).on('click', '.new-row', function() {
        var store = $('#newlink input[name=prestore]').val();
        var link = $('#newlink input[name=prelink]').val();
        console.log(store, link);
        $('<li class="not-saved">' +
            '<a href="' + link + '">' + store + '</a>' +
            '<input type="hidden" name="rows[][link]" value="' + link + '">' +
            '<input type="hidden" name="rows[][store]" value="' + store + '">' +
            '</li>').appendTo('#link-list').hide().fadeIn(280);
        $('input[name=prestore]').val('');
        $('input[name=prelink]').val('');
    });
</script>