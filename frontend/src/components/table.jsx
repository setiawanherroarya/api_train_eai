import React from "react";

const Table = ({ data }) => {
  const rupiah = (number) => {
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR",
    }).format(number);
  };
  return (
    <table className="table" id="table-container">
      <thead>
        <tr>
          <th scope="col">Nama Kereta</th>
          <th scope="col">Rute</th>
          <th scope="col">Kelas</th>
          <th scope="col">Harga</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Berangkat</th>
          <th scope="col">Tiba</th>
          <th scope="col">Capacity</th>
        </tr>
      </thead>
      <tbody>
        {data.length > 0 &&
          data.map((target) => (
            <tr key={target.id}>
              <th scope="row">{target.name}</th>
              <td>{target.route}</td>
              <td>{target.class}</td>
              <td>{rupiah(target.price)}</td>
              <td>{target.date}</td>
              <td>{target.start}</td>
              <td>{target.finish}</td>
              <td>{target.capacity} Person</td>
            </tr>
          ))}
      </tbody>
    </table>
  );
};

export default Table;
