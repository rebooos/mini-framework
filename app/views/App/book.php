<div class="container">
    <div class="row" style="max-height:">
        <button class="btn btn-success js-add-record" data-toggle="modal" data-target="#addRecordModal">
            Добавление записи
        </button>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <br>
            <table id="bookTable" width="1110px"></table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-black-50" id="addRecordModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Карточка</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="updateRecordForm" method="post" action="/book/update">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="photoOld" value="">

                    <div id="image-preview">
                        <label for="image-upload" id="image-label">Фото:</label>
                        <input type="file" name="photo" id="image-upload"/>
                    </div>

                    <div class="form-group">
                        <label for="InputFirstName">Имя</label>
                        <input type="text"
                               class="form-control"
                               id="InputFirstName"
                               placeholder="Иван"
                               name="firstName">
                    </div>
                    <div class="form-group">
                        <label for="InputLastName">Фамилия</label>
                        <input type="text" class="form-control"
                               name="lastName"
                               id="InputLastName" placeholder="Чайков">
                    </div>
                    <div class="form-group">
                        <label for="InputPhone">Телефон</label>
                        <input type="tel" class="form-control"
                               name="phone"
                               id="InputPhone" placeholder="79995566123">
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Email</label>
                        <input type="email" class="form-control"
                               name="email"
                               id="InputEmail" placeholder="Чайков">
                    </div>
                    <div class="form-group">
                        <label for="InputOrganization">Организация</label>
                        <input type="text" class="form-control"
                               name="organization"
                               id="InputOrganization" placeholder="ООО Василек">
                    </div>
                    <div class="form-group">
                        <label for="InputComment">Коментарий</label>
                        <input type="text" class="form-control"
                               name="comment"
                               id="InputComment" placeholder="такой вот человек">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-success submitForm">Сохранить</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        let data = <?= json_encode($books); ?>,
            formSelector = $('#updateRecordForm'),
            modalWindow = $('#addRecordModal');

        let fileTypes = [
            'image/jpeg',
            'image/pjpeg',
            'image/png'
        ];

        function validFileType(file) {
            for(let i = 0; i < fileTypes.length; i++) {
                if(file.type === fileTypes[i]) {
                    return true;
                }
            }

            return false;
        }

        let table = $('#bookTable').DataTable({
            data: data,
            columns: [
                {title: 'id'},
                {title: 'Фото'},
                {title: 'Имя'},
                {title: 'Фамилия'},
                {title: 'Телефон'},
                {title: 'Email'},
                {title: 'Организация'},
                {title: 'Коментарий'}
                ],
            columnDefs: [
                {
                    "render": function ( data, type, row ) {
                        if (typeof data === "undefined" || data == null) {
                            return "";
                        }
                        return '<img src="'+data+'" width="25px">';
                    },
                    "targets": 1
                },
                { "visible": false,  "targets": [ 3 ] }
            ]
        });

        $('#bookTable tbody').on('click', 'tr', function () {
            let data = table.row(this).data();
            $.post(
                '/book/searchRecord',
                { id:data[0] },
                function (data) {
                    modalWindow.modal('toggle');
                    for (let i in data.record) {
                        if (i == 'photo') {
                            $('input[name="photoOld"]').val(data.record['photo']);
                        } else {
                            $('input[name="'+i+'"]').val(data.record[i]);
                        }
                    }

                    if (typeof data.record.photo !== "undefined" && data.record.photo != null) {
                        $('#image-preview')
                            .attr('style', 'background-image: url('+data.record.photo+'); ' +
                                'background-size: cover; ' +
                                'background-position: center center;');
                    }
                }, "json");
        });

        $('.submitForm').click(function () {

            let file_data = $('#image-upload').prop('files')[0];
            if (typeof file_data !== "undefined") {
                if (file_data.size > 2097152) {
                    alert("Размер файла превышает 2мб");
                    return;
                }

                if (!validFileType(file_data)) {
                    alert("Тип файла не корректный " + file_data.type);
                    return;
                }
            }

            let form_data = new FormData(document.forms.updateRecordForm);

            $.ajax({
                url: formSelector.attr("action"),
                data: form_data,
                type: 'POST',
                cache: false,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status == "ok") {
                        if (typeof data.record != "undefined") {
                            let id = data.record[0];
                            table.row( $('td:contains("'+id+'")').parent('tr') ).remove().draw();
                            table.row.add(data.record).draw(false);
                            formSelector.trigger('reset');
                            modalWindow.modal('hide');
                        }
                    } else {
                        alert('bad');
                    }
                }
            });

        });

        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label"
        });
    });
</script>

<style type="text/css">
    #image-preview {
        width: 400px;
        height: 400px;
        position: relative;
        overflow: hidden;
        background-color: #ffffff;
        color: #ecf0f1;
    }

    #image-preview input {
        line-height: 200px;
        font-size: 200px;
        position: absolute;
        opacity: 0;
        z-index: 10;
    }

    #image-preview label {
        position: absolute;
        z-index: 5;
        opacity: 0.8;
        cursor: pointer;
        background-color: #bdc3c7;
        width: 200px;
        height: 50px;
        font-size: 20px;
        line-height: 50px;
        text-transform: uppercase;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        text-align: center;
    }
</style>