<script id="table-render" type="text/x-handlebars-template">
    {{#each data}}
    <tr data-id="{{this.id}}">
        <td>{{this.name}}</td>
        <td>{{this.surname}}</td>
        <td>{{this.description}}</td>

        <?php if($isAdmin):?>
            <td>
                <button class="btn action-view" data-bs-toggle="modal" data-bs-target="#detailsModal" data-bs-whatever="@mdo"  data-id="{{this.id}}">
                    View details
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-primary action-edit" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo"  data-id="{{this.id}}">
                    edit
                </button>
                <div class="visually-hidden" type="application/json">{{json this}}</div>
            </td>
            <td>
                <button class="btn btn-danger action-delete" data-id="{{this.id}}">delete</button>
            </td>
        <?php endif; ?>
    </tr>
    {{/each}}

</script>

<script id="details-table-render" type="text/x-handlebars-template">
    {{#each data}}
    <tr data-id="{{this.id}}">
        <td>{{this.invention_date}}</td>
        <td>{{this.description}}</td>
    </tr>
    {{/each}}

</script>

