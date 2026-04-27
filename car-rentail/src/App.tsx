
import { useState } from 'react'
import './App.css'
import Card from './components/Card'
function App() {
  const [elementos, setElementos] = useState([]) as any
  const[name, setName] = useState("")
  const agregar = () => {
    setElementos([...elementos,name])
  }
  return (
    <>
      <h1>{name}</h1>
      <input type="text" value={name} onChange={(e)=>{setName(e.target.value)}} />
      <button onClick={agregar}>Agregar</button>
      {
        elementos.map(()=>{
         return <Card/>
        })
      }
      
    </>
  )
}

export default App
