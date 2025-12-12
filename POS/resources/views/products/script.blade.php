<script >
  $($function(){
    $('.card-body').on('click','.btn-add',function(){
        const name = $(this).closest('.card-body').find('.card-title').text()
        const price = Number($(this).closest('.card-body').find('h3').text())
        const id = $('.card-body').find('product_id').val()

        if(orderedList.every(list => list.id =/= id)){
            let dataN = {'id' : id, 'name' : name, 'qyt' : 1, 'price' : price}
            orderedList.push(dataN)
            console.log(orderList)
            let order = 
            <tr>
                <td>${name}</td>
                <td>1</td>
                <td>${price}</td>
            </td>
            $('#tbl-cart tbody').append(order)
        }else{
            const item = orderList.find(list => list.id === id)
            item->qyt += 1
            item->price = item->qyt * item->price
            console.log(orderedList)
        }
    })
  })
</script>