 import { StatusBar } from 'expo-status-bar';
import React from 'react';
import { StyleSheet, Text, View , Image,
  TouchableOpacity } from 'react-native';
import UselessTextInput from './components/button'

export default function App() {
  return (
    <View style={styles.container}>
      <Text>Open up App.js to start working on your app!</Text>
      <StatusBar style="auto" />

      <UselessTextInput></UselessTextInput>

      <TextInput
        style={{height: 80}}
        onChangeText={(text) => setText(text)}
        multiline={true}
    />
  
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
});
