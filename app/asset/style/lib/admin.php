<style>
    #maincontent{
        width: 80%;
        margin: 0 auto;
        #welcome{
            display: inline-block;
            position: relative;
            height: 50px;
            line-height: 50px;
            text-align: center;
            padding: 0 30px;
            font-size: 18px;
            background: #5d627b;
            color: #FFF;
            box-sizing: border-box;
        }
        #welcome:before, #welcome:after{
            position: absolute;
            content: '';
            width: 0px;
            height: 0px;
            z-index: 1;
        }
        #welcome:before{
            top: 0;
            left: 0;
            border-width: 25px 0px 25px 15px;
            border-color: transparent transparent transparent #fff;
            border-style: solid;
        }
        #welcome:after{
            top: 0;
            right: 0;
            border-width: 25px 15px 25px 0px;
            border-color: transparent #fff transparent transparent;
            border-style: solid;
        }
    }
    pre{
        text-wrap: wrap;
        word-wrap: break-word;
    }
</style>