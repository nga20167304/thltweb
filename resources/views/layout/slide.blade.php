<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="40000">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php $index = 0 ?>
        @foreach($slides as $slide)
            @if(!empty($slide->Hinh))
                @if($index == 0)
                    <li data-target="#myCarousel" data-slide-to="{{$index}}" class="active"></li>
                @else
                    <li data-target="#myCarousel" data-slide-to="{{$index}}"></li>
                @endif
                <?php $index += 1 ?>
            @endif
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php $i = 0 ?>
        @foreach($slides as $slide)
            @if(!empty($slide->Hinh))
                @if($i == 0)
                    <div class="item active">
                        <div style="display: flex; flex-direction: row; align-items: flex-end;">
                            <span style="flex: 1; padding: 20px; font-size: 18px; margin-left: 20px;">
                                <span style="font-size: 24px; font-weight: bold;">{{$slide->Ten}}</span><br><br><br>
                                {!! html_entity_decode($slide->NoiDung) !!}<br>
                                <a href="{{$slide->link}}">Click xem ngay...</a>
                            </span>
                            <a style="flex: 1" href="{{$slide->link}}">
                                <img src="upload/slide/{{$slide->Hinh}}" alt="Chicago"
                                     style="width:100%; height: 400px;">
                            </a>
                        </div>
                    </div>
                @else
                    <div class="item">
                        <div style="display: flex; flex-direction: row; align-items: flex-end;">
                            <span style="flex: 1; padding: 20px; font-size: 18px; margin-left: 20px;">
                                <span style="font-size: 24px; font-weight: bold;">{{$slide->Ten}}</span><br><br><br>
                                {!! html_entity_decode($slide->NoiDung) !!}<br>
                                <a href="{{$slide->link}}">Click xem ngay...</a>
                            </span>
                            <a style="flex: 1" href="{{$slide->link}}">
                                <img src="upload/slide/{{$slide->Hinh}}" alt="Chicago"
                                     style="width:100%; height: 400px;">
                            </a>
                        </div>
                    </div>
                @endif
                <?php $i += 1 ?>
            @endif
        @endforeach
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="width: auto;">
        <span class="arrow-slide glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next" style="width: auto;">
        <span class="arrow-slide glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
