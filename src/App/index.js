import React from 'react';
import { AppUI } from './AppUI';
import {TodoProvider} from '../TodoContext';



function App() {
  // Desestructuramos los datos que retornamos de nuestro custom hook, y le pasamos los argumentos que necesitamos (nombre y estado inicial)
 



  return (
    <TodoProvider>
      <AppUI/>
    </TodoProvider>
    
  );
}

export default App;