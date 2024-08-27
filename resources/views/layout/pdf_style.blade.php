<style>

    @font-face {
        font-family: OpenSans;
        src: url('{{ storage_path('fonts/open-sans/OpenSans-Regular.ttf') }}') format('truetype');
        font-weight: 'normal';
    }

    @font-face {
        font-family: OpenSans;
        src: url('{{ storage_path('fonts/open-sans/OpenSans-Semibold.ttf') }}') format('truetype');
        font-weight: 'bold';
    }

    @font-face {
        font-family: OpenSans;
        src: url('{{ storage_path('fonts/open-sans/OpenSans-Italic.ttf') }}') format('truetype');
        font-weight: 'normal';
        font-style: italic;

    }

    @font-face {
        font-family: OpenSans;
        src: url('{{ storage_path('fonts/open-sans/OpenSans-BoldItalic.ttf') }}') format('truetype');
        font-weight: 'bold';
        font-style: italic;

    }
    
    


    body {
        width: 100%;
        font-family: 'OpenSans';
        color: #000;
        font-size: 18px;
        line-height: 1.42857143;
    }
    .heading{ 
        display: block;
        margin-top: 10px;
        /* font-size: 16px; */
    }
    .table {
        margin-bottom: 20px;
        background-color: transparent;
    }
    table {
        width: 100%;
        max-width: 100%;
        border-spacing: 0;
        border-collapse: collapse;
        background-color: transparent;

    }
    table td, table th{ vertical-align: top}
    

    div.table-bordered > table,
    div.table-bordered > table > thead > tr > th,
    div.table-bordered > table > tbody > tr > th,
    div.table-bordered > table > tfoot > tr > th,
    div.table-bordered > table > thead > tr > td,
    div.table-bordered > table > tbody > tr > td,
    div.table-bordered > table > tfoot > tr > td,
    table.table-bordered,
    table.table-bordered > thead > tr > th,
    table.table-bordered > tbody > tr > th,
    table.table-bordered > tfoot > tr > th,
    table.table-bordered > thead > tr > td,
    table.table-bordered > tbody > tr > td,
    table.table-bordered > tfoot > tr > td {
        border: 1px solid #aaa !important;
    }
    .table-condensed > thead > tr > th,
    .table-condensed > tbody > tr > th,
    .table-condensed > tfoot > tr > th,
    .table-condensed > thead > tr > td,
    .table-condensed > tbody > tr > td,
    .table-condensed > tfoot > tr > td {
        padding: 5px;
    }
    table > thead > tr > th,
    table > thead > tr > td {
        background-color: #aaa;
    }
    th {
        text-align: left;
    }
    table > thead > tr > th,
    table > tbody > tr > th,
    table > tfoot > tr > th {
        font-size: 18px;
    }
    table.no-border,
    table.no-border > thead > tr > th,
    table.no-border > tbody > tr > th,
    table.no-border > tfoot > tr > th,
    table.no-border > thead > tr > td,
    table.no-border > tbody > tr > td,
    table.no-border > tfoot > tr > td 
    {
        border: none !important;
    }
    ::before,
    ::after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    h3,
    .h3 {
        font-size: 28px;
    }
    
    h4,
    .h4 {
        font-size: 24px;
    }
    
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
        
        font-weight: 500;
        line-height: 1.1;
        color: inherit;
    }
    
    div.table-bordered > table,
    div.table-bordered > table > thead > tr > th,
    div.table-bordered > table > tbody > tr > th,
    div.table-bordered > table > tfoot > tr > th,
    div.table-bordered > table > thead > tr > td,
    div.table-bordered > table > tbody > tr > td,
    div.table-bordered > table > tfoot > tr > td,
    
    table.table-bordered,
    table.table-bordered > thead > tr > th,
    table.table-bordered > tbody > tr > th,
    table.table-bordered > tfoot > tr > th,
    table.table-bordered > thead > tr > td,
    table.table-bordered > tbody > tr > td,
    table.table-bordered > tfoot > tr > td {
        border: 1px solid #aaa !important;
    }

    .text-right {
    text-align: right;
    }
    .text-center {
    text-align: center;
    }

    .page {
        page-break-before: always;
    }
    .page:first-child{
        page-break-before: unset;
    }
    .header.header-tall {
        height: 1in;
    }
    .body {
        margin-top: 30px;
    }


    .block {
        background-color: #eee !important;
        padding: 2px 2px 2px 15px;
        margin-bottom: 15px;
    }

    .corner-ribbon {
        /* border: 1px solid black; */
        position: relative;
        display: inline-block;
        padding: 5px;
        overflow: hidden;
        font-size: 20px;
        font-weight: bold;
        float: right;
        height: 105px;
        width: 100px;
        top: -2px;
        right: -2px; 
    }

    .corner-ribbon span {
        font-family: 'OpenSans' !important;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2), inset 0px 5px 30px rgba(255, 255, 255, 0.2);
        padding: 0px 10px;
        /* text-transform: uppercase; */
        text-align: center;
        width: 180px;
        display: inline-block;
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        position: absolute;
        right: -70px;
        top: 16px;
        color: #fff !important;
        line-height: 1;
    }

    .corner-ribbon.black span {
        background-color: #333 !important;
    }

    .corner-ribbon.grey span {
        background-color: #999 !important;
    }

    .corner-ribbon.blue span {
        background-color: #39d !important;
    }

    .corner-ribbon.green span {
        background-color: #2c7 !important;
    }

    .corner-ribbon.red span {
        background-color: #e43 !important;
    }

    .corner-ribbon.orange span {
        background-color: #e82 !important;
    }

    .corner-ribbon.white span {
        background-color: #fff !important;
        color: #bbb !important;
    }


    
</style>