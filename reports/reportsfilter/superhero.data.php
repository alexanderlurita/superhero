<h1 class="text-md text-center"><?=$race?>, <?=$gender?>, <?=$alignment?></h1>

<table class="table table-border mt-3">
  <colgroup>
    <col style='width: 20%'>
    <col style='width:20%'>
    <col style='width:20%'>
    <col style='width:20%'>
    <col class='text-end' style='width:20%'>
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Hair colour</th>
      <th>Publisher</th>
      <th>Weight</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($datos as $registro): ?>
      <tr>
        <td><?=$registro['id']?></td>
        <td><?=$registro['superhero_name']?></td>
        <td><?=$registro['hair_colour']?></td>
        <td><?=$registro['publisher_name']?></td>
        <td><?=$registro['weight_kg']?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>