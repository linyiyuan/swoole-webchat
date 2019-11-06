@if(session('message'))
    @if(session('message')['code'] == 200)
        <div class="success" >
                成功消息提示：{{  session('message')['message'] }}
        </div>
    @elseif(session('message')['code'] == 400)
        <div class="error" >
                错误信息提示：{{ session('message')['message'] }}
        </div>
    @endif
@endif

@if (count($errors) > 0)
    <div class="error" >
        {{--<button type="button" class="error-close">&times;</button>--}}
        @foreach ($errors->all() as $error)
            错误信息：{{ $error }}
        @endforeach
    </div>
@endif

<style>
    .error {
        position: absolute;
        top: 0;
        width: 100%;
        height: 50px;
        line-height: 50px;
        font-size: 20px;
        text-align: center;
        background-color: #fef0f0;
        border-color: #fde2e2;
        color: #f56c6c;
    }
    .success {
        position: absolute;
        top: 0;
        width: 100%;
        height: 50px;
        line-height: 50px;
        font-size: 18px;
        text-align: center;
        border-color: #e1f3d8;
        background-color: #f0f9eb;
        color: #67c23a;
    }

</style>
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<script>
    // 定时清除错误提示框
    $(function() {
        setTimeout(function () {
            $('.error').css('display', 'none')
            $('.success').css('display', 'none')
        }, 2000)
    })
</script>