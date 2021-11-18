<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>COACHTECH</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <!-- reset css -->
        <style>
            html, body, div, span, object, iframe,
            h1, h2, h3, h4, h5, h6, p, blockquote, pre,
            abbr, address, cite, code,
            del, dfn, em, img, ins, kbd, q, samp,
            small, strong, sub, sup, var,
            b, i,
            dl, dt, dd, ol, ul, li,
            fieldset, form, label, legend,
            table, caption, tbody, tfoot, thead, tr, th, td,
            article, aside, canvas, details, figcaption, figure,
            footer, header, hgroup, menu, nav, section, summary,
            time, mark, audio, video {
                margin:0;
                padding:0;
                border:0;
                outline:0;
                font-size:100%;
                vertical-align:baseline;
                background:transparent;
            }
            body {line-height:1;}
            article,aside,details,figcaption,figure,
            footer,header,hgroup,menu,nav,section {
                display:block;}
            nav ul {
                list-style:none;
            }
            blockquote, q {
                quotes:none;
            }
            blockquote:before, blockquote:after,
            q:before, q:after {
                content:'';
                content:none;
            }
            a {
                margin:0;
                padding:0;
                font-size:100%;
                vertical-align:baseline;
                background:transparent;
            }

            /* change colours to suit your needs */
            ins {    background-color:#ff9;
                color:#000;
                text-decoration:none;
            }

            /* change colours to suit your needs */
            mark {
                background-color:#ff9;
                color:#000;
                font-style:italic;
                font-weight:bold;
            }

            del {
                text-decoration: line-through;
            }

            abbr[title], dfn[title] {
                border-bottom:1px dotted;
                cursor:help;
            }

            table {
                border-collapse:collapse;
                border-spacing:0;
            }

            /* change border colour to suit your needs */
            hr {
                display:block;
                height:1px;
                border:0;
                border-top:1px solid #cccccc;
                margin:1em 0;
                padding:0;
            }

            input, select {
                vertical-align:middle;
            }

            button {
                outline: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }

        </style>
        <!-- css for app-->
        <style>
            .back{
                display:flex;
                align-items: center;
                background: #2d197c;
                width: 100vw;
                height:100vh;
            }

            .card{
                width: 50%;
                margin: auto;
                padding:30px;
                background: #fff;
                border-radius: 10px;
            }

            h2{
                font-size: 24px;
            }

            button{
                font-size: 12px;
                font-weight: 600;
                border-radius: 4px;
                background-color:transparent;
                padding-right: 12px;
                padding-left: 12px;
                line-height: 30px;
            }

            .add{
                margin-top: 15px;
                margin-bottom: 30px;
            }

            .add form{
                display: flex;
                justify-content: space-between;
            }

            .add input{
                display: inline-block;
                width:40vw;
                height:30px;
                border:2px solid rgb(217, 217, 217);
                border-radius: 5px;
                outline: none;
                appearance: none;
                font-size: 14px;
            }

            .add button{
                display: inline-block;
                border: 2px solid rgb(220, 112, 250);
                color: rgb(220, 112, 250);
                cursor: pointer;
            }

            .add button:hover{
                background-color: rgb(220, 112, 250);
                color: #fff;
                cursor: pointer;
            }

            table{
                margin: 0px auto 20px;
                width:98%;
                text-align: center;
            }

            th{
                font-size: 16px;
                padding-bottom: 30px;
            }

            tr{
                font-size: 16px;
            }

            td{
                padding-bottom: 10px;
            }

            table input{
                appearance: none;
                outline: none;
                font-size: 12px;
                width:19vw;
                height:24px;
                border:2px solid rgb(217, 217, 217);
                border-radius: 5px;
            }

            table button.upb{
                border:2px solid rgb(250, 151, 112);
                color: rgb(250, 151, 112);
            }

            table button.upb:hover{
                background-color: rgb(250, 151, 112);
                color: #fff;
                cursor: pointer;
            }

            table button.dlb{
                border:2px solid rgb(113, 250, 220);
                color: rgb(113, 250, 220);
            }

            table button.dlb:hover{
                background-color: rgb(113, 250, 220);
                color: #fff;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="back">
            <div class="card">
                <h2>Todo List</h2>
                <div class="add">
                    <div>
                        @foreach ($errors->all() as $error)
                        <ul>
                            <li>{{ $error }}</li>
                        </ul>
                        @endforeach
                    </div>
                    <form action="/todo/create" method="POST">
                        @csrf
                        <input type="text" name="content" size="50">
                        <button type="submit">追加</button>
                    </form>
                </div>
                <table>
                    <tr>
                        <th>作成日</th>
                        <th>タスク名</th>
                        <th>更新</th>
                        <th>削除</th>
                    </tr>
                    @foreach($todos as $todo)
                    <tr>
                        <td> {{$todo->created_at}} </td>
                    　　<form action="/todo/update"  method="POST">
                        @csrf
                            <td><input type="text" name="content" value={{$todo->content}} ></td>
                            <td>
                                <button class="upb" type="submit" name="updateid" value={{$todo->id}}>更新</button>
                            </td>
                    　　</form>
                        <form action="/todo/delete" method="POST">
                        @csrf
                            <td>
                                <button class="dlb" type="submit" name="deleteid" value={{$todo->id}}>削除</button>
                            </td>
                    　　</form>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </body>
</html>