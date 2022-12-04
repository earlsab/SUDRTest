@extends('layouts.main')
@section('content')

<div class="keyworddiv">
<div class="keywordCont">
<li class="paperinfoHeader">
            Top used keywords in this timeline
        </li>

        <li class="pdfpaperInfo">
            <form method="get" action="{{route('Top3Keywords')}}">
                <div class="inputdataCont">
                    <div>
                        &nbsp From &nbsp
                        <select class="inputDesign" name="keyMonth">
                            <option selected disabled>Select Month</option>
                            <?php
                                for ($i = 0; $i < 12; $i++) {
                                    $time = strtotime(sprintf('%d months', $i));   
                                    $label = date('F', $time);   
                                    $value = date('n', $time);
                                    echo "<option value='$value'>$label</option>";
                                }
                            ?>
                        </select>
                        <input type="text" class="inputDesign" placeholder="year" name="keyYear">
                       &nbsp&nbsp&nbsp <button class="redBtn" type="submit">Search</button>
                    </div>
                    <br>
                    <br>
            
                    @foreach($top3_keywords_names as $top3keys)
                        
                        {{$top3keys}} <br>

                    @endforeach
                </div>
            </form>
        </li>
</div>
</div>

<footer>
	<p>Silliman University Digital Repository</p>
</footer>

@endsection