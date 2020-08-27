<?php
        $paginator = $this->Paginator->setTemplates([
            'number' => '<li class="page-item"><a href="{{url}}" class="page-link" >{{text}}</a>',
            'current' => '<li class="page-item active"><a href="{{url}}" class="page-link" >{{text}}</a>',
            'first' => '<li class="page-item"><a href="{{url}}" class="page-link" >&laquo</a>',
            'last' => '<li class="page-item"><a href="{{url}}" class="page-link" >&raquo</a>',
            'prevActive' => '<li class="page-item"><a href="{{url}}" class="page-link" >&lt</a>',
            'nextActive' => '<li class="page-item"><a href="{{url}}" class="page-link" >&gt</a>'
        ]);
    ?>

        <nav aria-label="paginacao">
            <ul class="pagination pagination-sm justify-content-center">
            <?php
            echo $paginator->first();
            if($paginator->hasPrev){
                echo $paginator->prev();
            }
            echo $paginator->numbers();
            if($paginator->hasNext){
                echo $paginator->next();
            }
            echo $paginator->last();
            ?>
            </ul>
        </nav>