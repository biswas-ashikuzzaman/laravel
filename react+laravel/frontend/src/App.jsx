import { useEffect, useState } from 'react';
import axios from 'axios';

function App() {
  const [products, setProducts] = useState([]);
  const [form, setForm] = useState({ name: "", price: "", description: "" });

  useEffect(() => {
    loadData();
  }, []);

  const loadData = async () => {
    let res = await axios.get("http://127.0.0.1:8000/api/products");
    setProducts(res.data);
  };

  const submit = async (e) => {
    e.preventDefault();
    await axios.post("http://127.0.0.1:8000/api/products", form);
    loadData();
  };

  return (
    <>
      <h1>Product CRUD</h1>

      <form onSubmit={submit}>
        <input placeholder="Name" onChange={(e)=>setForm({...form,name:e.target.value})}/>
        <input placeholder="Price" onChange={(e)=>setForm({...form,price:e.target.value})}/>
        <input placeholder="Description" onChange={(e)=>setForm({...form,description:e.target.value})}/>
        <button>Add Product</button>
      </form>

      <ul>
        {products.map(p => (
          <li key={p.id}>{p.name} - {p.price}</li>
        ))}
      </ul>
    </>
  );
}

export default App;
