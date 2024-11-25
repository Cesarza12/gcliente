import React, { useState } from 'react';
import { View, Text, TextInput, Button, StyleSheet, TouchableOpacity, ScrollView, Alert } from 'react-native';

const App = () => {
  const [clientes, setClientes] = useState([]); // Lista de clientes
  const [id, setId] = useState(0); // ID inicial
  const [nombre, setNombre] = useState('');
  const [debe, setDebe] = useState('');
  const [fecha, setFecha] = useState('');

  const guardarCliente = () => {
    if (nombre.trim() === '' || debe.trim() === '' || fecha.trim() === '') {
      Alert.alert('Error', 'Por favor completa todos los campos.');
      return;
    }

    const nuevoCliente = { id, nombre, debe, fecha };
    setClientes([...clientes, nuevoCliente]);
    setId(id + 1); // Incrementa el ID
    setNombre('');
    setDebe('');
    setFecha('');
    Alert.alert('Guardado', `Cliente ${nombre} ha sido guardado.`);
  };

  const resetearId = () => {
    setClientes([]); // Elimina todos los clientes
    setId(0); // Reinicia el ID
    Alert.alert('ID reiniciado', 'Todos los registros han sido eliminados y el ID se ha reiniciado a 0.');
  };

  return (
    <ScrollView contentContainerStyle={styles.container}>
      <Text style={styles.title}>Gestión de Clientes</Text>
      <Text style={styles.idText}>ID Actual: {id}</Text>
      <TextInput
        style={styles.input}
        placeholder="Nombre del cliente"
        value={nombre}
        onChangeText={setNombre}
      />
      <TextInput
        style={styles.input}
        placeholder="Deuda"
        value={debe}
        onChangeText={setDebe}
        keyboardType="numeric"
      />
      <TextInput
        style={styles.input}
        placeholder="Fecha"
        value={fecha}
        onChangeText={setFecha}
      />
      <Button title="Guardar" color="#28a745" onPress={guardarCliente} />
      <View style={styles.buttonsContainer}>
        <TouchableOpacity style={[styles.button, styles.reset]} onPress={resetearId}>
          <Text style={styles.buttonText}>Reiniciar ID</Text>
        </TouchableOpacity>
      </View>
    </ScrollView>
  );
};

const styles = StyleSheet.create({
  container: {
    flexGrow: 1,
    padding: 20,
    backgroundColor: '#f9f9f9',
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
    marginBottom: 20,
    textAlign: 'center',
  },
  idText: {
    fontSize: 18,
    color: '#333',
    marginBottom: 10,
    textAlign: 'center',
  },
  input: {
    borderWidth: 1,
    borderColor: '#007bff',
    borderRadius: 4,
    padding: 10,
    marginBottom: 10,
    fontSize: 16,
  },
  buttonsContainer: {
    marginTop: 20,
    alignItems: 'center',
  },
  button: {
    padding: 15,
    borderRadius: 4,
    alignItems: 'center',
  },
  reset: {
    backgroundColor: '#dc3545',
  },
  buttonText: {
    color: '#fff',
    fontWeight: 'bold',
  },
});

export default App;
