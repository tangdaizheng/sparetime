<?php if (!defined('THINK_PATH')) exit();?><!--表单开始-->
<form id="add-dict-form" action="javascript:void(0)">

  <!--标题开始-->
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加字典</h4>
  </div>
  <!--标题结束-->
  
  <div class="modal-body">
  
      <!--字典名称开始-->
      <div class="form-group input-group">
        <div class="input-group-addon">名称</div>
        <input type="text" class="form-control input-sm" name="dictname" placeholder="字典名称" required="required"/>
      </div>
      <!--字典名称结束-->
      
      <!--字典编码开始-->
      <div class="form-group input-group">
        <div class="input-group-addon">编码</div>
        <input type="text" class="form-control input-sm" name="dictcode" placeholder="字典编码" required="required"/>
      </div>
      <!--字典编码结束-->
      
      <!--字典类型开始-->
      <div class="form-group input-group">
        <div class="input-group-addon">类型</div>
        <input type="text" class="form-control input-sm" value="<?php echo ($dicttype["dicttypename"]); ?>" readonly="true" required="required"/>
        <input type="hidden" name="dicttypecode" value="<?php echo ($dicttype["dicttypecode"]); ?>"/>
        <input type="hidden" name="dicttypeid" value="<?php echo ($dicttype["id"]); ?>"/>
      </div>
      <!--字典类型结束-->
      
      <!--字典排序开始-->
      <div class="form-group input-group">
        <div class="input-group-addon">排序</div>
        <input type="number" class="form-control input-sm" name="orderby" placeholder="字典排序" required="required"/>
      </div>
      <!--字典排序结束-->
      
      <!--状态开始-->
      <div class="form-group input-group">
        <div class="input-group-addon">状态</div>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary btn-sm active">
            <input type="radio" name="status" autocomplete="off" value="1" checked="true"/>启用
          </label>
          <label class="btn btn-primary btn-sm">
            <input type="radio" name="status" autocomplete="off" value="0"/>停用
          </label>
        </div>
      </div>
      <!--状态结束-->
      
  </div>
  
  <div class="modal-footer">
    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">关闭</button>
    <button type="submit" class="btn btn-primary btn-sm">保存</button>
  </div>
  
</form>
<!--表单结束-->

<script type="text/javascript">

$("#add-dict-form").submit(function() {
    var params = $("#add-dict-form").serializeArray();
    $.ajax({
        type: "POST",
        url: "<?php echo U('/dict/add');?>",
        data: params,
        dataType: "json",
        success: function(data){
            $('#dict-modal').modal('hide')
            alert(data.content);
            $('#dictGrid').datagrid('reload');
        }
    });
});

</script>