import { useEffect, useState } from "react";
import axios from "axios";

function App() {
  const [products, setProducts] = useState([]);
  const [form, setForm] = useState({ name: "", price: "", description: "" });
  const [editingId, setEditingId] = useState(null);

  useEffect(() => {
    loadData();
  }, []);

  const loadData = async () => {
    try {
      let res = await axios.get("http://127.0.0.1:8000/api/products");
      setProducts(res.data);
    } catch (err) {
      console.error(err);
    }
  };

  const submit = async (e) => {
    e.preventDefault();
    try {
      if (editingId) {
        await axios.put(
          `http://127.0.0.1:8000/api/products/${editingId}`,
          form
        );
        setEditingId(null);
      } else {
        await axios.post("http://127.0.0.1:8000/api/products", form);
      }
      setForm({ name: "", price: "", description: "" });
      loadData();
    } catch (err) {
      console.error(err);
    }
  };

  const editProduct = (product) => {
    setForm({
      name: product.name,
      price: product.price,
      description: product.description,
    });
    setEditingId(product.id);
  };

  const deleteProduct = async (id) => {
    if (window.confirm("Are you sure you want to delete this product?")) {
      try {
        await axios.delete(`http://127.0.0.1:8000/api/products/${id}`);
        loadData();
      } catch (err) {
        console.error(err);
      }
    }
  };

  return (
    <div style={{ width: "80%", margin: "20px auto", fontFamily: "Arial" }}>
      <h1 style={{ textAlign: "center" }}>Product CRUD</h1>

      <form
        onSubmit={submit}
        style={{
          display: "flex",
          gap: "10px",
          marginBottom: "20px",
          justifyContent: "center",
        }}
      >
        <input
          placeholder="Name"
          value={form.name}
          onChange={(e) => setForm({ ...form, name: e.target.value })}
        />
        <input
          placeholder="Price"
          value={form.price}
          onChange={(e) => setForm({ ...form, price: e.target.value })}
        />
        <input
          placeholder="Description"
          value={form.description}
          onChange={(e) =>
            setForm({ ...form, description: e.target.value })
          }
        />
        <button>{editingId ? "Update" : "Add"}</button>
        {editingId && (
          <button
            type="button"
            onClick={() => {
              setEditingId(null);
              setForm({ name: "", price: "", description: "" });
            }}
          >
            Cancel
          </button>
        )}
      </form>

      <table
        style={{
          width: "100%",
          borderCollapse: "collapse",
          textAlign: "left",
        }}
      >
        <thead>
          <tr>
            <th style={{ border: "1px solid #ddd", padding: "8px" }}>ID</th>
            <th style={{ border: "1px solid #ddd", padding: "8px" }}>Name</th>
            <th style={{ border: "1px solid #ddd", padding: "8px" }}>Price</th>
            <th style={{ border: "1px solid #ddd", padding: "8px" }}>
              Description
            </th>
            <th style={{ border: "1px solid #ddd", padding: "8px" }}>
              Actions
            </th>
          </tr>
        </thead>
        <tbody>
          {products.map((p) => (
            <tr key={p.id}>
              <td style={{ border: "1px solid #ddd", padding: "8px" }}>{p.id}</td>
              <td style={{ border: "1px solid #ddd", padding: "8px" }}>{p.name}</td>
              <td style={{ border: "1px solid #ddd", padding: "8px" }}>{p.price}</td>
              <td style={{ border: "1px solid #ddd", padding: "8px" }}>
                {p.description}
              </td>
              <td style={{ border: "1px solid #ddd", padding: "8px" }}>
                <button
                  onClick={() => editProduct(p)}
                  style={{
                    marginRight: "5px",
                    background: "none",
                    border: "none",
                    cursor: "pointer",
                  }}
                  title="Edit"
                >
                  ✏️
                </button>
                <button
                  onClick={() => deleteProduct(p.id)}
                  style={{
                    background: "none",
                    border: "none",
                    cursor: "pointer",
                  }}
                  title="Delete"
                >
                  🗑️
                </button>
              </td>
            </tr>
          ))}
          {products.length === 0 && (
            <tr>
              <td colSpan="5" style={{ textAlign: "center", padding: "10px" }}>
                No products found
              </td>
            </tr>
          )}
        </tbody>
      </table>
    </div>
  );
}

export default App;
