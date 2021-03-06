<?php if (!defined('THINK_PATH')) exit();?><!--表单开始-->
<form id="modify-dict-form" action="javascript:void(0)">

    <input type="hidden" name="id" value="<?php echo ($dict["id"]); ?>"/>
    
  <!--标题开始-->
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><p class="glyphicon glyphicon-edit" aria-hidden="true"></p>修改字典</h4>
  </div>
  <!--标题结束-->
  
  <div class="modal-body">
  
      <!--字典名称开始-->
      <div class="form-group input-group">
        <div class="input-group-addon">名称</div>
        <input type="text" class="form-control input-sm" name="dictname" placeholder="字典名称" value="<?php echo ($dict["dictname"]); ?>" required="required"/>
      </div>
      <!--字典名称结束-->
      
      <!--字典编码开始-->
      <div class="form-group input-group">
        <div class="input-group-addon">编码</div>
        <input type="text" class="form-control input-sm" name="dictcode" placeholder="字典编码" value="<?php echo ($dict["dictcode"]); ?>" required="required"/>
      </div>
      <!--字典编码结束-->
      
      <!--字典类型开始-->
      <div class="form-group input-group">
        <div class="input-group-addon">类型</div>
        <input type="text" class="form-control input-sm" name="dicttypecode" value="<?php echo ($dict["dicttypecode"]); ?>" id="dicttypecode" placeholder="类型编码" required="required"/>
        <div class="input-group-btn">
            <button type="button" class="btn btn-default dropdown-toggle input-sm" data-toggle="dropdown">
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu"></ul>
        </div>
      </div>
      <!--字典类型结束-->
      
      <!--字典类型编码-->
      <input type="hidden" name="dicttypeid" id="dicttypeid" value="<?php echo ($dict["id"]); ?>"/>
      
      <!--字典排序开始-->
      <div class="form-group input-group">
        <div class="input-group-addon">排序</div>
        <input type="number" class="form-control input-sm" name="orderby" placeholder="字典排序" value="<?php echo ($dict["orderby"]); ?>" required="required"/>
      </div>
      <!--字典排序结束-->
      
      <!--状态开始-->
      <div class="form-group input-group">
        <div class="input-group-addon">状态</div>
        <div class="btn-group" data-toggle="buttons">
          <?php if($dict["status"] == 1): ?><label class="btn btn-primary btn-sm active">
                <input type="radio" name="status" autocomplete="off" value="1" checked="true"/>启用
              </label>
              <label class="btn btn-primary btn-sm">
                <input type="radio" name="status" autocomplete="off" value="0"/>停用
              </label>
          <?php else: ?>
              <label class="btn btn-primary btn-sm">
                <input type="radio" name="status" autocomplete="off" value="1" />启用
              </label>
              <label class="btn btn-primary btn-sm active">
                <input type="radio" name="status" autocomplete="off" value="0" checked="true"/>停用
              </label><?php endif; ?>
        </div>
      </div>
      <!--状态结束-->
      
  </div>
  
  <div class="modal-footer">
    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">关闭</button>
    <button type="submit" class="btn btn-primary btn-sm">修改</button>
  </div>
  
</form>
<!--添加字典表单结束-->

<script type="text/javascript">

$("#modify-dict-form").submit(function() {
    var params = $("#modify-dict-form").serializeArray();
    $.ajax({
        type: "POST",
        url: "<?php echo U('/dict/modify');?>",
        data: params,
        dataType: "json",
        success: function(data){
            $('#dict-modal').modal('hide')
            alert(data.content);
            $('#dictGrid').datagrid('reload');
        }
    });
});

// 类型编码下拉选择
var dicttypecodeBsSuggest = $("input#dicttypecode").bsSuggest({
    url: "/index.php/dicttype/dropdownJson",
    getDataMethod: "url",
    idField: "id",
    keyField: "dicttypecode",
    listAlign: "right",
}).on('onSetSelectValue', function (e, keyword) {
  $("#dicttypeid").val(keyword.id);
});

</script>